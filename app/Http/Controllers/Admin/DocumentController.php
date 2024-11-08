<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
      // จัดการเอกสาร ,หน้าแรก
    function documents($document_type)
    {
        $menu = 'manage_document';

        return view('admin.documents', compact('menu','document_type'));
    }

    function document_form($document_type){
        $menu = 'manage_document';
        return view('admin.document_upload',compact('menu','document_type'));
    }
    
    function create_document(Request $request, $document_type) {
        $validDocumentTypes = ['document_manual', 'document_2'];
    
        if (!in_array($document_type, $validDocumentTypes)) {
            return redirect()->back()->with('error', 'Invalid document type.');
        }
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:4096',
        ]);
    
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $document_type . '.' . $extension; 
    
            // Check if the previous document exists and delete it
            $previousDocumentPath = 'documents/' . $filename;
            if (Storage::disk('public')->exists($previousDocumentPath)) {
                Storage::disk('public')->delete($previousDocumentPath);
            }
    
            $path = $request->file('image')->storeAs('documents', $filename, 'public'); 
    
            return redirect()->back()->with('success', 'Image uploaded successfully. Path: ' . $path);
        }
    
        return redirect()->back()->with('error', 'Image upload failed.');
    }
    

}

