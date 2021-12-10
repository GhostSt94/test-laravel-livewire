<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Contacts extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $name,$tel,$ville,$photo;
    public $contacts;
    public $contactId;
    public $editing=false;

    protected $rules = [
        'name' => 'required|min:4',
        'tel' => 'required|min:10',
        'ville' => 'required|min:4',
        'photo' => 'image|max:1024'
    ];
    protected $messages = [
        'name.required' => 'Required',
        'tel.required' => 'Required',
        'ville.required' => 'Required'
    ];

    public function changeName()
    {
        $this->name="Mohamed";
    }

    public function refreshName()
    {
        $this->name="Reda";
    }
    public function addContact()
    {
        $this->validate();
        $newContact=new Contact();
        $newContact->name=$this->name;
        $newContact->tel=$this->tel;
        $newContact->ville=$this->ville;
        $newContact->photo=$this->photo->hashName();
        $newContact->save();
        $this->photo->store('photos','public');
        // $this->contacts->prepend;
        $this->contacts->push($newContact);
        $this->name="";
        $this->ville="";
        $this->tel="";
        $this->photo=null;
        session()->flash('message', 'Contact successfully added.');
    }
    public function mount()
    {
        $this->getContacts();
    }
    
    public function getContacts()
    {
        $this->contacts=Contact::all();
    }

    public function getContact($contactId)
    {
        $contact=Contact::find($contactId);
        $this->contactId=$contact->id;
        $this->name=$contact->name;
        $this->tel=$contact->tel;
        $this->ville=$contact->ville;
        $this->editing=true;
    }

    public function updateContact()
    {
        $this->validate([
            'name' => 'required|min:4',
            'tel' => 'required|min:10',
            'ville' => 'required|min:4',
        ]);
        $contact=Contact::find($this->contactId);
        // ->update([
        //     'name'=>$this->name,
        //     'ville'=>$this->ville,
        //     'tel'=>$this->tel
        // ]);
        $contact->name=$this->name;
        $contact->tel=$this->tel;
        $contact->ville=$this->ville;
        if($this->photo){
            $this->validate([
                'photo' => 'image|max:1024',
            ]);
            if(File::exists(public_path('./storage/photos/'.$contact->photo))){
                File::delete(public_path('./storage/photos/'.$contact->photo));
            };
            $contact->photo=$this->photo->hashName();
            $this->photo->store('photos','public');
        }
        $contact->update();
        session()->flash('message', 'Contact successfully updated.');
        $this->editing=false;
        $this->contactId=null;
        $this->name='';
        $this->tel='';
        $this->ville='';
    }

    public function deleteContact($contactId)
    {
        $contact=Contact::find($contactId);
        if(File::exists(public_path('./storage/photos/'.$contact->photo))){
            File::delete(public_path('./storage/photos/'.$contact->photo));
        };
        $contact->delete();
        $this->contacts=$this->contacts->except($contactId);
        session()->flash('message', 'Contact successfully deleted.');
    }

    public function render()
    {
        return view('livewire.contacts',[
            'contactsList'=>Contact::paginate(5)
        ]);
    }
}
