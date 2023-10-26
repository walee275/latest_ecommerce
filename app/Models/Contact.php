<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'email',
        'phone_no',
        'extension',
        'direct_phone',
        'prefered_method_of_contact',
        'contact_type',
    ];

    public function practice_entity(){
        return $this->hasOne(PracticianEntityContact::class)->with('practice_entity.user');
    }




    public static function pratice_contacts($practice){
        // dd($practice);
        $practice_contacts = [];
        $contacts = PracticianEntityContact::where('practician_entity_id', $practice->id)->get();

        foreach($contacts as $contact){
            $practice_contacts[] = Contact::with('practice_entity.user')->where('id',$contact->contact_id)->first();
        }
        return $practice_contacts;
    }


}
