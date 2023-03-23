<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Users\StoreUsersUseCaseInterface;
use Illuminate\Http\Request;

class StoreUsersController extends Controller
{
    private StoreUsersUseCaseInterface $storeUsersUseCase;

    public function __construct(StoreUsersUseCaseInterface $storeUsersUseCase)
    {
        $this->storeUsersUseCase = $storeUsersUseCase;
    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        // Here it validates the request
        $fields = [
            'name' => 'required|string',
            'email' => 'required|string',
            'cellphone' => 'required|string',
            'password' => 'required|string',
            'user_img' => 'mimes:jpg,jpeg,png',
            'age' =>  'integer',
            'occupation' => 'string',
            'marital_status' => 'string',
            'religion' =>  'string',
            'locality' => 'string',
            'pathological_history' => 'string',
            'cardiovascular' => 'string',
            'pulmonary' => 'string',
            'digestive' => 'string',
            'diabetes' => 'string',
            'kidney' => 'string',
            'clotting_problems' => 'string',
            'surgical' => 'string',
            'allergies' => 'string',
            'medicines' => 'string',
            'alcohol' => 'integer',
            'smoking' => 'integer',
            'dope' => 'integer',
            'family_background' => 'string',
            'emotional_background' => 'string',
            'comment' => 'string',
            'role' => 'string'
        ];

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
        $alcohol = intval($request->input('alcohol'));
        $smoking = intval($request->input('smoking'));
        $dope = intval($request->input('dope'));
        $familyBackground = $request->input('family_background');
        $emotionalBackground = $request->input('emotional_background');
        $comment = $request->input('comment');
        $role = $request->input('role');

        // Calling through Interface the use case method and send by parameter data got before
        $userSaved = $this->storeUsersUseCase->handle(
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
            $role
        );

        if (! $userSaved) {
            return redirect()->route('users.index', ['id' => $role])
                ->with('FailedUserStore', 'No se pudo registrar el usuario');
        }

        return redirect()->route('users.index', ['id' => $role])
            ->with('SuccessfulUserStore', 'Usuario registrado con éxito');

    }
}
