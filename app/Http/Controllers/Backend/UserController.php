<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller {
    /**
     * User Logout
     */
    public function adminLogout() {
        Auth::guard( 'web' )->logout();
        return redirect()->route( 'login' )->with( 'success', 'Your are successfully logout :) ' );
    }

    /**
     * All Users View
     */
    public function usersList() {
        $users = User::where( 'id', '!=', 1 )->latest()->get();
        return view( 'backend.users.all_user', compact( 'users' ) );
    }

    /**
     * User Create Page
     */
    public function usersCreate() {
        return view( 'backend.users.create_users' );
    }

    /**
     * User Store
     */
    public function usersStore( Request $request ) {

      

        $this->validate( $request, [
            'email'    => 'required',
            'password' => 'required|confirmed',
        ] );

        User::create( [
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => password_hash( $request->password, PASSWORD_DEFAULT ),
            'type'            => 2,
            'category'        => $request->category,
            'tag'             => $request->tag,
            'country'         => $request->country,
            'packages'        => $request->packages,
            'post'            => $request->post,
            'destination'     => $request->destination,
            'travel_gallery'  => $request->travel_gallery,
            'tour_guide'      => $request->tour_guide,
            'reviewer'        => $request->reviewer,
            'users'           => $request->users,
            'settings'        => $request->settings,
            'contact_us'      => $request->contact_us,
            'booking_package' => $request->booking_package,
            'subscriber'      => $request->subscriber,
        ] );

        $notification = [
            'message'    => 'User added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route( 'users.list' )->with( $notification );
    }

    /**
     * Edit User
     */
    public function usersEdit( $id ) {
        $data = User::findOrFail( $id );
        return view( 'backend.users.edit_users', [
            'data' => $data,
        ] );
    }

    /**
     * Update User
     */
    public function usersUpdate( Request $request, $id ) {

        $data = User::findOrFail( $id );

        $data->name = $request->name;
        $data->email = $request->email;
        $data->type = 2;
        $data->category = $request->category;
        $data->tag = $request->tag;
        $data->country = $request->country;
        $data->packages = $request->packages;
        $data->post = $request->post;
        $data->destination = $request->destination;
        $data->travel_gallery = $request->travel_gallery;
        $data->tour_guide = $request->tour_guide;
        $data->reviewer = $request->reviewer;
        $data->users = $request->users;
        $data->settings = $request->settings;
        $data->contact_us = $request->contact_us;
        $data->booking_package = $request->booking_package;
        $data->subscriber = $request->subscriber;
        $data->update();

        $notification = [
            'message'    => 'User updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route( 'users.list' )->with( $notification );

    }

    /**
     * User Delete
     */
    public function usersDelete( $id ) {
        User::findOrFail( $id )->delete();

        $notification = [
            'message'    => 'User Delete successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route( 'users.list' )->with( $notification );
    }

    
    /////////////////// User Profile ///////////////////

    /**
     * User Profile Page
     */
    public function userProfile() {
        $data = User::findOrFail( Auth::user()->id );
        return view( 'backend.users.profile.profile', [
            'data' => $data,
        ] );
    }

    /**
     * User Profile Edit
     */
    public function userProfileEdit( $id ) {
        $data = User::findOrFail( $id );
        return view( 'backend.users.profile.profile_edit', [
            'data' => $data,
        ] );
    }

    /**
     * User Update Profile
     */
    public function usersUpdateProfile( Request $request, $id ) {
        $data = User::findOrFail( $id );

        $user_image = [];
        if ( $request->hasFile( 'profile_photo_path' ) ) {
            $image = $request->file( 'profile_photo_path' );
            $unique_image = md5( time() . rand() ) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(128, 128)->save('upload/users/'. $unique_image);

            $user_image = 'upload/users/' . $unique_image;

            if ( file_exists($data->profile_photo_path ) && !empty( $data->profile_photo_path ) ) {
                unlink( $data->profile_photo_path );
            }

        } else {
            $user_image = $data->profile_photo_path;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->profile_photo_path = $user_image;
        $data->update();

        $notification = [
            'message'    => 'User profile updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route( 'user.profile' )->with( $notification );

    }


    /**
     * Change Password
     */
    public function changePassword() {
        return view( 'backend.users.password.change_password' );
    }


    /**
     * Update password
     */
    public function updatePassword( Request $request, $id ) {
        // find user has or not
        $data = User::where( 'id', $id )->first();

        // user data successfully get or not
        if ( $data != null ) {
            // check password match or not
            if ( Auth::guard( 'web' )->attempt( ['email' => $request->email, 'password' => $request->old_password] ) ) {

                $data->password = password_hash( $request->new_password, PASSWORD_DEFAULT );
                $data->update();

                $notification = [
                    'message'    => 'Password updated successfully',
                    'alert-type' => 'success',
                ];

                return redirect()->route( 'user.profile' )->with( $notification );

            } else {

                $notification = [
                    'message'    => 'Sorry! your password and email do not match our record.',
                    'alert-type' => 'warning',
                ];

                return redirect()->back()->with( $notification );

            }
        } else {

            $notification = [
                'message'    => 'Something is wrong! plase try again!',
                'alert-type' => 'warning',
            ];

            return redirect()->back()->with( $notification );

        }
    }

}
