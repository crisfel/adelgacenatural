<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Users\UpdateUsersUseCaseInterface;
use Illuminate\Http\Request;

class UpdateUsersController extends Controller
{
    private UpdateUsersUseCaseInterface $updateUsersUseCase;

    public function __construct(UpdateUsersUseCaseInterface $updateUsersUseCase)
    {
        $this->updateUsersUseCase = $updateUsersUseCase;
    }

    public function __invoke(Request $request)
    {
        //return $request;

        if ($request->input('role') == 'therapist' || $request->input('role') == 'administrator') {
            $fields = [
                'name' => 'required|string',
                'email' => 'required|string',
                'cellphone' => 'required|string',
                'user_img' => 'mimes:jpg,jpeg,png',
            ];
        }
        if ($request->input('role') == 'patient') {
            $fields = [
                'name' => 'required|string',
                'email' => 'required|string',
                'cellphone' => 'required|string',
                'password' => 'string',
                'user_img' => 'mimes:jpg,jpeg,png',
                'age' =>  'required|integer',
                'occupation' => 'required|string',
                'marital_status' => 'required|string',
                'religion' =>  'required|string',
                'locality' => 'required|string',
                'pathological_history' => 'required|string',
                'cardiovascular' => 'required|string',
                'pulmonary' => 'required|string',
                'digestive' => 'required|string',
                'diabetes' => 'required|string',
                'kidney' => 'required|string',
                'clotting_problems' => 'required|string',
                'surgical' => 'required|string',
                'allergies' => 'required|string',
                'medicines' => 'required|string',
                'alcohol' => 'required|integer',
                'smoking' => 'required|integer',
                'dope' => 'required|integer',
                'family_background' => 'required|string',
                'emotional_background' => 'required|string',
                'comment' => 'required|string',
            ];
        }

        $message = [
            'required'=>':attribute es requerido',
        ];

        $this->validate($request, $fields, $message);

        // Set variables with request's inputs
        $name = $request->input('name');
        $email = $request->input('email');
        $cellphone = $request->input('cellphone');
        $password = $request->input('password');
        $userIMG = $request->file('user_img');
        $age = $request->input('age');
        $occupation = $request->input('occupation');
        $maritalStatus = $request->input('marital_status');
        $religion = $request->input('religion');
        $locality = $request->input('locality');
        $pathologicalHistory = $request->input('pathological_history');
        $cardiovascular = $request->input('cardiovascular');
        $pulmonary = $request->input('pulmonary');
        $digestive = $request->input('digestive');
        $diabetes = $request->input('diabetes');
        $kidney = $request->input('kidney');
        $clottingProblems = $request->input('clotting_problems');
        $surgical = $request->input('surgical');
        $allergies = $request->input('allergies');
        $medicines = $request->input('medicines');
        $alcohol = $request->input('alcohol');
        $smoking = $request->input('smoking');
        $dope = $request->input('dope');
        $familyBackground = $request->input('family_background');
        $emotionalBackground = $request->input('emotional_background');
        $comment = $request->input('comment');
        $role = $request->input('role');
        $userID = $request->input('userID');

        // Calling through Interface the use case method and send by parameter data got before
        $userUpdated = $this->updateUsersUseCase->handle(
            $name,
            $email,
            $cellphone,
            $password,
            $userIMG,
            $age,
            $occupation,
            $maritalStatus,
            $religion,
            $locality,
            $pathologicalHistory,
            $cardiovascular,
            $pulmonary,
            $digestive,
            $diabetes,
            $kidney,
            $clottingProblems,
            $surgical,
            $allergies,
            $medicines,
            $alcohol,
            $smoking,
            $dope,
            $familyBackground,
            $emotionalBackground,
            $comment,
            $role,
            $userID
        );

        if (! $userUpdated) {
            return redirect()->route('users.index', ['id' => $role])
                ->with('FailedUserUpdate', 'No se pudo modificar el usuario');
        }

        return redirect()->route('users.index', ['id' => $role])
            ->with('SuccessfulUserUpdate', 'Usuario modificado con éxito');

    }
}
