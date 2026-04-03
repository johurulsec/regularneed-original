<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Order;
use App\Helpers\FileHelper;
use App\Models\PostComment;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        $profile = Auth()->user();
        return view('user.users.profile')->with('profile', $profile);
    }

    // public function profileUpdate(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     $data = $request->all();
    //     $status = $user->fill($data)->save();
    //     if ($status) {
    //         request()->session()->flash('success', 'Successfully updated your profile');
    //     } else {
    //         request()->session()->flash('error', 'Please try again!');
    //     }
    //     return redirect()->back();
    // }


    public function profileUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
            $validatedData['photo'] = FileHelper::upload($request->file('photo'), 'backend/img/profile');
        }

        // Update user
        $status = $user->update($validatedData);

        $request->session()->flash(
            $status ? 'success' : 'error',
            $status ? 'Successfully updated your profile' : 'Please try again!'
        );

        return redirect()->back();
    }



    // Order
    public function orderIndex()
    {
        $orders = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(10);
        return view('user.order.index')->with('orders', $orders);
    }

    public function userOrderDelete($id)
    {
        $order = Order::find($id);
        if ($order) {
            if ($order->status == "process" || $order->status == 'delivered' || $order->status == 'cancel') {
                return redirect()->back()->with('error', 'You can not delete this order now');
            } else {
                $status = $order->delete();
                if ($status) {
                    request()->session()->flash('success', 'Order Successfully deleted');
                } else {
                    request()->session()->flash('error', 'Order can not deleted');
                }
                return redirect()->route('user.order.index');
            }
        } else {
            request()->session()->flash('error', 'Order can not found');
            return redirect()->back();
        }
    }

    public function orderShow($id)
    {
        $order = Order::find($id);
        return view('user.order.show')->with('order', $order);
    }

    // Product Review
    public function productReviewIndex()
    {
        $reviews = ProductReview::getAllUserReview();
        return view('user.review.index')->with('reviews', $reviews);
    }

    public function productReviewEdit($id)
    {
        $review = ProductReview::find($id);
        return view('user.review.edit')->with('review', $review);
    }

    public function productReviewUpdate(Request $request, $id)
    {
        $review = ProductReview::find($id);
        if ($review) {
            $data = $request->all();
            $status = $review->fill($data)->update();
            if ($status) {
                request()->session()->flash('success', 'Review Successfully updated');
            } else {
                request()->session()->flash('error', 'Something went wrong! Please try again!!');
            }
        } else {
            request()->session()->flash('error', 'Review not found!!');
        }

        return redirect()->route('user.productreview.index');
    }

    public function productReviewDelete($id)
    {
        $review = ProductReview::find($id);
        $status = $review->delete();
        if ($status) {
            request()->session()->flash('success', 'Successfully deleted review');
        } else {
            request()->session()->flash('error', 'Something went wrong! Try again');
        }
        return redirect()->route('user.productreview.index');
    }

    public function userComment()
    {
        $comments = PostComment::getAllUserComments();
        return view('user.comment.index')->with('comments', $comments);
    }

    public function userCommentDelete($id)
    {
        $comment = PostComment::find($id);
        if ($comment) {
            $status = $comment->delete();
            if ($status) {
                request()->session()->flash('success', 'Post Comment successfully deleted');
            } else {
                request()->session()->flash('error', 'Error occurred please try again');
            }
            return back();
        } else {
            request()->session()->flash('error', 'Post Comment not found');
            return redirect()->back();
        }
    }

    public function userCommentEdit($id)
    {
        $comments = PostComment::find($id);
        if ($comments) {
            return view('user.comment.edit')->with('comment', $comments);
        } else {
            request()->session()->flash('error', 'Comment not found');
            return redirect()->back();
        }
    }

    public function userCommentUpdate(Request $request, $id)
    {
        $comment = PostComment::find($id);
        if ($comment) {
            $data = $request->all();
            $status = $comment->fill($data)->update();
            if ($status) {
                request()->session()->flash('success', 'Comment successfully updated');
            } else {
                request()->session()->flash('error', 'Something went wrong! Please try again!!');
            }
            return redirect()->route('user.post-comment.index');
        } else {
            request()->session()->flash('error', 'Comment not found');
            return redirect()->back();
        }
    }

    public function changePassword()
    {
        return view('user.layouts.userPasswordChange');
    }

    public function changPasswordStore(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return back()->withErrors(['current-password' => 'The provided password does not match your current password.']);
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return back()->withErrors(['new-password' => 'New Password cannot be same as your current password.']);
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return back()->with('success', 'Password changed successfully !');
    }

    /**
     * Show user's coin balance and transaction history
     */
    public function coinBalance()
    {
        $user = auth()->user();
        $transactions = \App\Models\CoinTransaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('user.coin-balance')->with([
            'user' => $user,
            'transactions' => $transactions
        ]);
    }
}
