<?php

namespace App\Repositories\Users;

use App\Models\PatientTreatment;
use App\Models\Treatment;
use App\Models\User;
use App\Repositories\Contracts\Users\UserRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class UserRepository implements UserRepositoryInterface
{
    public function getByRole($role)
    {
        if ($role == 'patient') {
            return User::where(
                [
                    ['role', '=', $role],
                    ['therapist_id', '=', Auth::user()->id],
                    ['is_deleted', '=', 0]
                ]
            )->get();
        }

        return User::where(
            [
                ['role', '=', $role],
                ['is_deleted', '=', 0]
            ]
        )->get();


    }

    public function save(string $name, string $email, string $cellphone, string $password, ?UploadedFile $userIMG, ?int $age,
                              ?string $occupation, ?string $maritalStatus, ?string $religion, ?string $locality,
                              ?string $pathologicalHistory, ?string $cardiovascular, ?string $pulmonary, ?string $digestive,
                              ?string $diabetes, ?string $kidney, ?string $clottingProblems, ?string $surgical, ?string $allergies,
                              ?string $medicines, ?int $alcohol, ?int $smoking, ?int $dope, ?string $familyBackground,
                              ?string $emotionalBackground, ?string $comment, string $role):bool
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->cellphone = $cellphone;
        $user->password = bcrypt($password);
        $user->age = $age;
        $user->occupation = $occupation;
        $user->marital_status = $maritalStatus;
        $user->religion = $religion;
        $user->locality = $locality;
        $user->pathological_history = $pathologicalHistory;
        $user->cardiovascular = $cardiovascular;
        $user->pulmonary = $pulmonary;
        $user->digestive = $digestive;
        $user->diabetes = $diabetes;
        $user->kidney = $kidney;
        $user->clotting_problems = $clottingProblems;
        $user->surgical = $surgical;
        $user->allergies = $allergies;
        $user->medicines = $medicines;
        $user->alcohol = $alcohol;
        $user->smoking = $smoking;
        $user->dope = $dope;
        $user->family_background = $familyBackground;
        $user->emotional_background = $emotionalBackground;
        $user->comment = $comment;
        $user->role = $role;

        if ($role == 'patient') {
            $user->therapist_id = Auth::user()->id;
        }

        $user->assignRole($role);
        $user->save();

        if (isset($userIMG))
        {
            $pathName = sprintf('users_images/%s.png', $user->id);
            Storage::disk('public')->put($pathName, file_get_contents($userIMG));
            $client = new Client();
            $url = "https://adelgacenatural.com/upload.php";

            $client->request(RequestAlias::METHOD_POST, $url, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => fopen(
                            str_replace(
                                '\\',
                                '/',
                                Storage::path('public\users_images\\' . $user->id . '.png')
                            ),
                            'r'
                        )
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'users_images'
                    ]
                ]
            ]);
            $user->url_img = '/storage/users_images/' . $user->id . '.png';
            $user->save();
            unlink(str_replace('\\', '/', storage_path('app/public/users_images/'.$user->id.'.png')));
        }

        return true;
    }

    public function update(string $name, string $email, string $cellphone, ?string $password, ?UploadedFile $userIMG, ?int $age,
                           ?string $occupation, ?string $maritalStatus, ?string $religion, ?string $locality,
                           ?string $pathologicalHistory, ?string $cardiovascular, ?string $pulmonary, ?string $digestive,
                           ?string $diabetes, ?string $kidney, ?string $clottingProblems, ?string $surgical, ?string $allergies,
                           ?string $medicines, ?int $alcohol, ?int $smoking, ?int $dope, ?string $familyBackground,
                           ?string $emotionalBackground, ?string $comment, string $role, int $userID):bool
    {

        $user = User::find($userID);
        $user->name = $name;
        $user->email = $email;
        $user->cellphone = $cellphone;
        if (isset($password)) {
            $user->password = bcrypt($password);
        }
        $user->age = $age;
        $user->occupation = $occupation;
        $user->marital_status = $maritalStatus;
        $user->religion = $religion;
        $user->locality = $locality;
        $user->pathological_history = $pathologicalHistory;
        $user->cardiovascular = $cardiovascular;
        $user->pulmonary = $pulmonary;
        $user->digestive = $digestive;
        $user->diabetes = $diabetes;
        $user->kidney = $kidney;
        $user->clotting_problems = $clottingProblems;
        $user->surgical = $surgical;
        $user->allergies = $allergies;
        $user->medicines = $medicines;
        $user->alcohol = $alcohol;
        $user->smoking = $smoking;
        $user->dope = $dope;
        $user->family_background = $familyBackground;
        $user->emotional_background = $emotionalBackground;
        $user->comment = $comment;
        if ($role == 'therapist') {
            $user->assignRole('therapist');
        }
        if ($role == 'patient') {
            $user->assignRole('patient');
        }
        $user->save();

        if (isset($userIMG)) {
            $pathName = sprintf('users_images/%s.png', $user->id);
            Storage::disk('public')->put($pathName, file_get_contents($userIMG));
            $client = new Client();
            $url = "https://adelgacenatural.com/upload.php";

            $client->request(RequestAlias::METHOD_POST, $url, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => fopen(
                            str_replace(
                                '\\',
                                '/',
                                Storage::path('public\users_images\\' . $user->id . '.png')
                            ),
                            'r'
                        )
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'users_images'
                    ]
                ]
            ]);
            $user->url_img = '/storage/users_images/' . $user->id . '.png';
            $user->save();
            unlink(str_replace('\\', '/', storage_path('app/public/users_images/'.$user->id.'.png')));
        }

        return true;
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function delete($id):bool
    {
        $user = User::find($id);
        $user->is_deleted = 1;
        $user->save();

        return true;
    }

    public function getTreatmentsOfPatient($id)
    {
        return PatientTreatment::where([
            ['user_id', $id],
        ])->get();
    }

    public function saveAssignments($treatmentIDS, $userID): bool
    {
        $patientTreatments = $this->getTreatmentsOfPatient($userID);
        foreach ($patientTreatments as $treatment) {
            PatientTreatment::destroy($treatment->id);
        }

       foreach ($treatmentIDS as $id) {
           $patientTreatment = new PatientTreatment();
           $patientTreatment->user_id = $userID;
           $patientTreatment->treatment_id = $id;
           $patientTreatment->save();
       }

       return true;

    }

    public function enableByIdAndBoolean($id, $boolean): bool
    {
        $user = User::find($id);
        $user->is_enabled = $boolean;
        $user->save();

        return true;
    }


}
