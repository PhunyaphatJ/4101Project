<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Document;

class DocumentController extends Controller
{
      // จัดการเอกสาร ,หน้าแรก
    function documents()
    {
        $menu = 'manage_document';

        $documents = Document::all();

        return view('admin.admin_layout', compact('menu','documents'));
    }

    function document_form(){

        return view('admin.document_test');
    }

    function create_document(Request  $request){
        $request->validate([
            'document_file' => 'required|file',
        ],
        [
            'document_file.required' => 'กรุณาเพิ่มไฟล์' 
        ]);
        $file = $request->file('document_file');
        $filename = Str::uuid().'.'.$request->document_name.'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('documents',$filename);

        abort_if(!$path, 500, 'Failed to store the file.');

        $document = Document::create([
            'document_path' => $path,
            'document_type' => $file->getClientOriginalExtension(),
            'admin_email' => 'roberta08@example.org',
        ]);
        // $document->save();
        abort_if(!$document, 500, 'Failed to create the document.');


        return response()->json(['message' => 'document uploaded successfully'], 201);
    }

    function document_detail($document_id){
        $document = Document::findOrFail($document_id);

        $path = $document->document_path;
        if (Storage::exists($path)) {
            $fileContent = Storage::get($path);
            // Get the file's MIME type (e.g., pdf, jpg, png)
            $mimeType = Storage::mimeType($path);
    
            return new Response($fileContent, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="' . $filename . '"'
            ]);
        } else {
            abort(404, 'Document not found.');
        }
        return compact('document');
    }


    function update_document($document_id){

    }
}
