<?php

namespace Modules\Chat\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyTicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'department' => 'required',
            'complaint' => 'required',
            'message_content' => 'required',
            'priority' => 'required',
            'image' => 'image|file|max:1024',
            'notifikasi' => 'required|numeric',
            'notif_delete' => 'required|numeric',
            'name_sender' => 'required',
            'room_uuid' => 'required',
            'video' => 'mimetypes:video/mp4|max:5000',
            'document' => 'mimetypes:application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint|max:5000'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
