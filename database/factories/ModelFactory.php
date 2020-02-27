<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\City::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'state_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ContactMethod::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Disability::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Disease::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EducationLevel::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\State::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Status::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\QuestionnaireType::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ApplicantRelationship::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Applicant::class, static function (Faker\Generator $faker) {
    return [
        'names' => $faker->sentence,
        'last_names' => $faker->sentence,
        'birthdate' => $faker->dateTime,
        'gender' => $faker->sentence,
        'state_id' => $faker->sentence,
        'city_id' => $faker->sentence,
        'education_level' => $faker->sentence,
        'government_id' => $faker->sentence,
        'marital_status' => $faker->sentence,
        'pregnant' => $faker->boolean(),
        'pregnancy_due_date' => $faker->sentence,
        'parent_applicant' => $faker->sentence,
        'applicant_relationship' => $faker->sentence,
        'cadaster' => $faker->sentence,
        'property_id' => $faker->sentence,
        'occupation' => $faker->sentence,
        'monthly_income' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\QuestionnaireTemplate::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'enabled' => $faker->boolean(),
        'questionnaire_type_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ApplicantStatus::class, static function (Faker\Generator $faker) {
    return [
        'applicant_id' => $faker->sentence,
        'status_id' => $faker->sentence,
        'file_number' => $faker->sentence,
        'financial_entity_id' => $faker->sentence,
        'atc_id' => $faker->sentence,
        'entity_id' => $faker->sentence,
        'user_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ApplicantDocument::class, static function (Faker\Generator $faker) {
    return [
        'applicant_id' => $faker->sentence,
        'document_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
