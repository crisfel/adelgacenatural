<?php

namespace App\Repositories\Treatments;

use App\Models\PatientTreatment;
use App\Models\Treatment;
use App\Repositories\Contracts\Treatments\TreatmentRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class TreatmentRepository implements TreatmentRepositoryInterface
{
    public function getTreatments()
    {
        if (Auth::user()->role == 'patient') {
            $treatments = collect([]);

            $patientTreatments = PatientTreatment::where('user_id', Auth::user()->id)->get();

            foreach ($patientTreatments as $pTreatment) {
                if ($pTreatment->treatment->is_deleted == 0) {
                    $treatments->push($pTreatment->treatment);
                }
            }

            return $treatments;
        }

        return Treatment::where([
            ['therapist_id', Auth::user()->id],
                ['is_deleted', 0]
            ]
        )->get();
    }

    public function save(string $title, string $description, ?UploadedFile $treatmentIMG, UploadedFile $treatmentPDF):bool
    {
        $treatment = new Treatment();
        $treatment->title = $title;
        $treatment->description = $description;
        $treatment->urlFile = '';
        $treatment->therapist_id = Auth::user()->id;
        $treatment->save();

        if (isset($treatmentIMG)) {
            $pathName = sprintf('treatments_images/%s.png', $treatment->id);
            Storage::disk('public')->put($pathName, file_get_contents($treatmentIMG));
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
                                Storage::path('public\treatments_images\\' . $treatment->id . '.png')
                            ),
                            'r'
                        )
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'treatments_images'
                    ]
                ]
            ]);
            $treatment->urlImage = '/storage/treatments_images/' . $treatment->id . '.png';
            $treatment->save();
            unlink(str_replace('\\', '/', storage_path('app/public/treatments_images/'.$treatment->id.'.png')));
        }

        if (isset($treatmentPDF)) {
            $pathName = sprintf('treatments_files/%s.pdf', $treatment->id);
            Storage::disk('public')->put($pathName, file_get_contents($treatmentPDF));
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
                                Storage::path('public\treatments_files\\' . $treatment->id . '.pdf')
                            ),
                            'r'
                        )
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'treatments_files'
                    ]
                ]
            ]);
            $treatment->urlFile = '/storage/treatments_files/' . $treatment->id . '.pdf';
            $treatment->save();
            unlink(str_replace('\\', '/', storage_path('app/public/treatments_files/'.$treatment->id.'.pdf')));
        }

        return true;
    }

    public function getTreatmentByID($id)
    {
        return Treatment::find($id);
    }

    public function update(string $title, string $description, ?UploadedFile $treatmentIMG, ?UploadedFile $treatmentFile, $treatmentID): bool
    {
        $treatment = Treatment::find($treatmentID);
        $treatment->title = $title;
        $treatment->description = $description;
        $treatment->save();

        if (isset($treatmentIMG)) {
            $pathName = sprintf('treatments_images/%s.png', $treatment->id);
            Storage::disk('public')->put($pathName, file_get_contents($treatmentIMG));
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
                                Storage::path('public\treatments_images\\' . $treatment->id . '.png')
                            ),
                            'r'
                        )
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'treatments_images'
                    ]
                ]
            ]);
            $treatment->urlImage = '/storage/treatments_images/' . $treatment->id . '.png';
            $treatment->save();
            unlink(str_replace('\\', '/', storage_path('app/public/treatments_images/'.$treatment->id.'.png')));
        }

        if (isset($treatmentPDF)) {
            $pathName = sprintf('treatments_files/%s.pdf', $treatment->id);
            Storage::disk('public')->put($pathName, file_get_contents($treatmentPDF));
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
                                Storage::path('public\treatments_files\\' . $treatment->id . '.pdf')
                            ),
                            'r'
                        )
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'treatments_files'
                    ]
                ]
            ]);
            unlink(str_replace('\\', '/', storage_path('app/public/treatments_files/'.$treatment->id.'.pdf')));
        }

        return true;
    }

    public function delete($id): bool
    {
        $treatment = Treatment::find($id);
        $treatment->is_deleted = 1;
        $treatment->save();

        return true;
    }
}
