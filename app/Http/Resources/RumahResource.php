<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RumahResource extends JsonResource
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
            'NomorRumah' => $this->nomor_rumah,
            'AlamatRumah' => $this->alamat_rumah,
            'Foto' => $this->foto_rumah
        ];
    }
}
