<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PenghuniResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Nama Lengkap' => $this->nama_lengkap,
            'Foto Ktp' => $this->foto_ktp,
            'Status Penghuni' => $this->status_penghuni,
            'Nomor Telp' => $this->nomor_telp,
            'Status Nikah' => $this->status_pernikahan,
        ];
    }
}
