<?php

namespace App\Openapi;

/**
 * @OA\Schema(
 *     type="object",
 *     title="Notebook showing request",
 *     description="Creating Notebook",
 * )
 */

class NotebookStoreRequest 
{
    /**
     * @OA\Property(
     *     title="name",
     *     description="Full name",
     *     example="John Doe Doe",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="company",
     *     description="Company name",
     *     example="SARTOJ Tech.",
     * )
     *
     * @var string
     */
    public $company;

    /**
     * @OA\Property(
     *     title="phone",
     *     description="Your phone number",
     *     example="+7777777777",
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *     title="email",
     *     description="Your email",
     *     example="info@sartoj.tech",
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="birthday",
     *     description="Your bitrthday",
     *     example="2022-02-22",
     * )
     *
     * @var date
     */
    public $birthday;

    /**
     * @OA\Property(
     *     title="photo",
     *     description="Your photo url",
     *     example="avatar.png",
     * )
     *
     * @var string
     */
    public $photo;
}