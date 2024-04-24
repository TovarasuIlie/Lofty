<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MadeToMeasureModel;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function viewNewOrdersPage() {
        $madeToMeasure = new MadeToMeasureModel();
        $orders = $madeToMeasure->select('id', 'fullname', 'email', 'phoneNumber', 'finished', 'placedAt')->where('finished', 0)->paginate(10);
        return view('dashboard/orders/new-orders', compact('orders'));
    }

    public function viewFinishedOrdersPage() {
        $madeToMeasure = new MadeToMeasureModel();
        $orders = $madeToMeasure->select('id', 'fullname', 'email', 'phoneNumber', 'finished', 'placedAt')->where('finished', 1)->paginate(10);
        return view('dashboard/orders/finished-orders', compact('orders'));
    }

    public function viewOrderDetailsPage($id) {
        $madeToMeasure = new MadeToMeasureModel();
        $order = $madeToMeasure->select('*')->where('id', $id)->first();
        return view('dashboard/orders/view-order-details', ['order' => $order]);
    }

    public function markFinished($id) {
        $madeToMeasure = new MadeToMeasureModel();
        $order = $madeToMeasure->where('id', $id)->update(['finished' => 1]);
        if($order) {
            DB::table('logs')->insert([
                'idStaff' => session()->get('id'),
                'logText' => '<b>'.session()->get('fullname').' ('.session()->get('email').')</b> a marcat comanda cu ID <a href="/dashboard/made-to-measure/comanda/'.$id.'">'.$id.'</a> ca si <span class="badge bg-success">Finalizata</span>',
                'ip' => session()->get('ip')
            ]);
            return redirect()->to('/dashboard/made-to-measure/comanda/'.$id)->with('success', 'Comanda a fost marcata pe succes!');
        } else {
            return redirect()->back()->with('error', 'A avut loc o eroare. Te rugam sa reincerci!');
        }
    }

    public function unmarkFinished($id) {
        $madeToMeasure = new MadeToMeasureModel();
        $order = $madeToMeasure->where('id', $id)->update(['finished' => 0]);
        if($order) {
            DB::table('logs')->insert([
                'idStaff' => session()->get('id'),
                'logText' => '<b>'.session()->get('fullname').' ('.session()->get('email').')</b> a marcat comanda cu ID <a href="/dashboard/made-to-measure/comanda/'.$id.'">'.$id.'</a> ca si <span class="badge bg-danger">Nefinalizata</span>',
                'ip' => session()->get('ip')
            ]);
            return redirect()->to('/dashboard/made-to-measure/comanda/'.$id)->with('success', 'Statusul comenzi a fost actualizat cu succes!');
        } else {
            return redirect()->back()->with('error', 'A avut loc o eroare. Te rugam sa reincerci!');
        }
    }
}
