<?php

namespace Database\Seeders;

use App\Models\HomepageContent;
use App\Models\Info;
use App\Models\Media;
use App\Models\Page;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('pass1234'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        HomepageContent::factory()->create([
            'section' => 'header',
            'title' => 'Audits, Compilations and Reviews Income Tax and Information Returns',
            'sub_title' => 'We provide for you',
            'description' => 'Over 30 Years of Tax Advice For Families and Small Businesses in Oakland, California & Beyond. Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda laudantium corrupti reiciendis illo, quas quam perspiciatis nemo dolores.',
            'image' => null,
            'schedule' => null,
            'address' => null,
            'url' => null
        ]);
        
        HomepageContent::factory()->create([
            'section' => 'features_1',
            'title' => 'Quality',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
        ]);
        HomepageContent::factory()->create([
            'section' => 'features_2',
            'title' => 'Experience',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
        ]);
        HomepageContent::factory()->create([
            'section' => 'features_3',
            'title' => 'Commitment',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.'
        ]);

        HomepageContent::factory()->create([
            'section' => 'about',
            'title' => 'Individuals and Business Tax & Accounting Solutions',
            'sub_title' => null,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus repudiandae inventore tenetur quis in, autem quod harum, debitis qui cum voluptas praesentium commodi quas quaerat suscipit dignissimos iusto, pariatur delectus. Vel beatae recusandae praesentium accusamus odio ipsam! Nobis, reiciendis eveniet expedita quia cumque, doloremque natus, accusamus corporis odit aut a. ',
            'image' => null,
            'schedule' => null,
            'address' => null,
            'url' => null
        ]);
        
        HomepageContent::factory()->create([
            'section' => 'our_philosophy',
            'title' => 'Our Guiding Philosophy',
            'sub_title' => null,
            'description' => 'Quality, experience, commitment and trust from the foundation of our success',
            'image' => null,
            'schedule' => null,
            'address' => null,
            'url' => null
        ]);

        HomepageContent::factory()->create([
            'section' => 'appointment',
            'title' => 'Book An Appointment',
            'sub_title' => null,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus repudiandae inventore tenetur quis in, autem quod harum, debitis qui cum voluptas praesentium commodi quas quaerat suscipit dignissimos iusto, pariatur delectus. Vel beatae recusandae praesentium accusamus odio ipsam! Nobis, reiciendis eveniet expedita quia cumque, doloremque natus, accusamus corporis odit aut a. ',
            'image' => null,
            'schedule' => 'Mon-Fri: 8:00am-5:00pm',
            'address' => '4225 Telegraph Avenue Oakland, CA 94609',
            'url' => null
        ]);

        Info::factory()->create([
            'title' => 'Ogbodo CPA',
            'description' => 'Over 30 Years of Tax Advice For Families and Small Businesses in Oakland, California & Beyond.',
        ]);

        Page::factory()->create([
            'name' => 'About Us',
            'slug' => 'about',
            'description' => 'This is about page',
            'content' => 'Over 30 Years of Tax Advice For Families and Small Businesses in Oakland, California & Beyond.',
        ]);

        Page::factory()->create([
            'name' => 'Contact Us',
            'slug' => 'contact',
            'description' => 'Contact Us any time'
        ]);

        Page::factory()->create([
            'name' => 'Our Services',
            'slug' => 'services',
            'description' => 'Our Services include Tax Preparation, Bookkeeping, Payroll, Business Consulting, and more. We provide expert financial solutions tailored to your needs.'
        ]);

        Page::factory()->create([
            'name' => 'Resources',
            'slug' => 'resources',
            'description' => 'Our Services include Tax Preparation, Bookkeeping, Payroll, Business Consulting, and more. We provide expert financial solutions tailored to your needs.'
        ]);
        
        Page::factory()->create([
            'name' => 'Appointment',
            'slug' => 'appointment',
            'description' => 'Our Services include Tax Preparation, Bookkeeping, Payroll, Business Consulting, and more. We provide expert financial solutions tailored to your needs.'
        ]);

        Media::factory()->create([
            'name' => 'facebook',
            'url' => 'https://facebook.com/username'
        ]);
        
        Media::factory()->create([
            'name' => 'instagram',
            'url' => 'https://instagram.com/username'
        ]);

        Media::factory()->create([
            'name' => 'twitter',
            'url' => 'https://twitter.com/username'
        ]);

        Media::factory()->create([
            'name' => 'youtube',
            'url' => 'https://youtube.com/username'
        ]);
       
        Media::factory()->create([
            'name' => 'github',
            'url' => 'https://github.com/username'
        ]);
        
        Media::factory()->create([
            'name' => 'dribbble',
            'url' => 'https://dribbble.com/username'
        ]);
    }
}
