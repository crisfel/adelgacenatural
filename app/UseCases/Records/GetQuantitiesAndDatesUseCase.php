<?php

namespace App\UseCases\Records;

use App\Repositories\Contracts\Records\RecordRepositoryInterface;
use App\UseCases\Contracts\Records\GetQuantitiesAndDatesUseCaseInterface;

class GetQuantitiesAndDatesUseCase implements GetQuantitiesAndDatesUseCaseInterface
{
    private RecordRepositoryInterface $recordRepository;

    public function __construct(RecordRepositoryInterface $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }

    public function handle(string $userID)
    {
        $records = $this->recordRepository->getRecords($userID, 'asc');

        if (isset($records[0])) {
            unset($records[0]['age'], $records[0]['id'], $records[0]['last_food'], $records[0]['recommendations'], $records[0]['recommendations'],
                $records[0]['news'], $records[0]['user_id'], $records[0]['updated_at'], $records[0]['detox'], $records[0]['oximetry_level']);
        }
        $quantities = array();
        $categories = array();
        $htmlContainers = '';
        if (isset($records[0])) {
            foreach ($records[0]->toArray() as $key => $value) {
                $auxArray = array();
                $dates = array();
                array_push($categories, $key);
                $htmlContainers .= '<div class="col-sm-10 col-md-10 col-lg-10 ms-auto me-auto rounded chart-container mb-4" style="display: none; overflow-x: scroll;"
                                        id="container' . $key . '"></div>';
                foreach ($records as $record) {
                    $recordArray = $record->toArray();
                    foreach ($recordArray as $key2 => $value) {
                        if ($key2 == $key) {
                            if ($key != 'created_at') {
                                array_push($auxArray, $value);
                            } else {
                                array_push($dates, strval(str_replace('-', '', substr($value, 0, -17))));
                            }
                        }
                    }
                }
                array_push($quantities, $auxArray);
            }


            if (count($dates) > 100) {
                $dates = array_slice($dates, -100);
            }
        }
        if (! isset($records[0])) {
            $dates = array();
        }

        return [
            'dates' =>  $dates,
            'quantities' => $quantities,
            'categories' => $categories,
            'htmlContainers' => $htmlContainers
        ];
    }
}
