<?php

namespace unionco\calendarize\feedme\fields;

use Cake\Utility\Hash;
use Craft;
use craft\feedme\base\Field;
use craft\feedme\base\FieldInterface;
use craft\feedme\helpers\DataHelper;
use unionco\calendarize\models\CalendarizeModel;

class CalendarizeField extends Field implements FieldInterface
{
    /**
     * @var string
     */
    public static string $name = 'Calendarize';

    /**
     * @var string
     */
    public static string $class = \unionco\calendarize\fields\CalendarizeField::class;

    /**
     * @inheritdoc
     */
    public function getMappingTemplate(): string
    {
        // Return a valid template path for your plugin:
        return 'calendarize/_includes/feedme/calendarize';
    }

    /**
     * @inheritdoc
     */
    public function parseField(): mixed
    {
        $preppedData = new CalendarizeModel($this->element, ['allDay' => true]);

//        $fields = Hash::get($this->fieldInfo, 'fields');
//
//        if (!$fields) {
//            return null;
//        }
//
//        foreach ($fields as $subFieldHandle => $subFieldInfo) {
//            $preppedData[$subFieldHandle] = DataHelper::fetchValue($this->feedData, $subFieldInfo, $this->feed);
//        }
//
//        // Protect against sending an empty array
//        if (!$preppedData) {
//            return null;
//        }

        return $preppedData;
    }
}