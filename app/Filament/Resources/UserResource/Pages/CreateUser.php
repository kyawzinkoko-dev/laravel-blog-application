<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        /** @var \App\Models\User $user */
        $user = parent::handleRecordCreation($data);
        $user->assignRole('admin');
        return $user;
    }
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        //insert email verified date before creating data
       $data['email_verified_at']=Carbon::now();
        //password encrypt  create 
        $data['password']=bcrypt($data['password']);
        return $data;
    }
}
