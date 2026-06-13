<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('sort_order')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.form', ['certificate' => new Certificate()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateCert($request);

        if ($request->hasFile('image')) {
            $result = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'portfolio/certificates',
            ]);
            $data['image'] = $result->getSecurePath();
        }

        Certificate::create($data);
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.form', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $data = $this->validateCert($request);

        if ($request->hasFile('image')) {
            $result = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'portfolio/certificates',
            ]);
            $data['image'] = $result->getSecurePath();
        }

        $certificate->update($data);
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated.');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return back()->with('success', 'Certificate deleted.');
    }

    private function validateCert(Request $request): array
    {
        return $request->validate([
            'title'          => 'required|string|max:255',
            'issuer'         => 'required|string|max:255',
            'description'    => 'nullable|string',
            'image'          => 'nullable|image|max:5120',
            'credential_url' => 'nullable|url|max:500',
            'issued_date'    => 'nullable|date',
            'sort_order'     => 'integer',
        ]);
    }
}
