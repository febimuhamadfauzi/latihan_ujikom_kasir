<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index() {
        $paymentMethods = PaymentMethod::all();
        return view('admin.payment-methods.index', compact('paymentMethods'));
    }

    public function create() {
        return view('admin.payment-methods.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:payment_methods']);
        PaymentMethod::create($request->all());
        return redirect()->route('admin.payment-methods.index')->with('success', 'Metode pembayaran ditambahkan!');
    }

    public function edit(PaymentMethod $paymentMethod) {
        return view('admin.payment-methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod) {
        $request->validate(['name' => 'required|unique:payment_methods,name,' . $paymentMethod->id]);
        $paymentMethod->update($request->all());
        return redirect()->route('admin.payment-methods.index')->with('success', 'Metode pembayaran diperbarui!');
    }

    public function destroy(PaymentMethod $paymentMethod) {
        $paymentMethod->delete();
        return redirect()->route('admin.payment-methods.index')->with('success', 'Metode pembayaran dihapus!');
    }
}
