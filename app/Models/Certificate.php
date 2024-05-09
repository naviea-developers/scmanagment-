<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    public function getCertificatesFileShowAttribute(){
        return $this->certificates_file != "" ? asset("public/upload/certificates/".$this->certificates_file) : asset("public/frontend/images/no-profile.jpg");
    }
}
