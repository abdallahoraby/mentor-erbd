<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\SiteImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
        if (Permission::first() == null){
            $roles_array = ['admin'];
            foreach (Permission::defaultPermissions() as $key => $perm) {
                Permission::firstOrCreate(['name' => $perm]);
            }
            foreach ($roles_array as $role) {
                $roles = Role::firstOrCreate(['name' => $role]);

                if ($roles->name == 'admin') {
                    // assign all permissions
                    $roles->syncPermissions(Permission::defaultPermissions());
                    $this->command->info('Admin granted all the permissions');
                } else {
                    // for others by default only read access
                    $roles->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->where('guard_name', $role)->get());
                }

                $user = App\Models\User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'phone' => '010943002344', 'password' => bcrypt(123456)]);
                $role_admin = App\Models\Role::firstOrCreate(['name' => 'admin']);
                $user->assignRole('admin');

            }
        }

        if (\App\Models\Theme::first() == null){
            $theme1= App\Models\Theme::create(['title' => 'theme1', 'image' => 'images/themes/theme1.PNG']);
            $theme2= App\Models\Theme::create(['title' => 'theme2', 'image' => 'images/themes/theme2.PNG']);
        }

        if (\App\Models\Country::first() == null){
            $country =  App\Models\Country::create(['name' => 'egypt']);
        }


        if (\App\Models\Site::first() == null){
            $default_url = env('DEFAULT_SITE_URL')??'http://127.0.0.1:8000';
            $site= App\Models\Site::create(['url' =>  $default_url,
                'title' => 'ebrd','logo' => 'images/sites/ebrd/logo.png','banner' => 'images/sites/ebrd/banner.jpg',
                'short_desc' => 'ebrd','content' => '','about_title' => 'ebrd','about_desc' => 'ebrd','about_image' => 'images/sites/ebrd/about.jpg','page_color' => '#000000','page_background_color' => '#ffffff','call_to_action_button_color' => '#567df4','call_to_action_button_content' => 'ebrd','copy_right' => 'ebrd','linkedin' => 'https://www.linkedin.com/company/micromentor','facebook' => 'https://www.facebook.com/MicroMentor.MENA','instagram' => 'https://www.instagram.com/micromentor_mena/','youtube' => 'https://www.youtube.com/watch?v=PpOuEBnsciw','twitter' => 'https://twitter.com/micromentormena','theme_id' => 2,'country_id' => 1]);
            $site->title = [
                'ar' => 'البنك الأوروبي لإعادة الإعمار والتنمية',
                'en' => 'EBRD',
            ];

            $site->short_desc = [
                'ar' => 'هذه المبادرة ممولة من قبل البنك الأوروبي لإعادة الإعمار والتنمية. لقد عقدنا شراكة مع ميكرومينتور وماستركارد لزيادة فرص خدمات الإرشاد في كل من شمال إفريقيا والشرق الأوسط.',
                'en' => 'This initiative is financed by the EBRD. We’re partnering with MicroMentor and the Mastercard Center for Inclusive Growth to increase access to mentoring services across North Africa and the Middle East.',
            ];


            $site->content = [
                'ar' => '<p><a href="https://www.micromentor.org/ebrd/"><img style="display: block; margin-left: auto; margin-right: auto;" title="EBRD_logo.png" src="https://d2win24dv6pngl.cloudfront.net/media/images/EBRD_blue_15mm_A_blue.max-600x600.png" alt="" width="235" height="150" /></a><br /><br /><a href="https://www.ebrdknowhowacademy.com/"><img style="display: block; margin-left: auto; margin-right: auto;" title="Artboard 3.png" src="https://www.ebrdknowhowacademy.com/pluginfile.php/1/theme_purity/headerlogo/1705400101/Artboard%203.png" alt="" width="236" height="99" /></a></p>',
                'en' => '<p><a href="https://www.micromentor.org/ebrd/"><img style="display: block; margin-left: auto; margin-right: auto;" title="EBRD_logo.png" src="https://d2win24dv6pngl.cloudfront.net/media/images/EBRD_blue_15mm_A_blue.max-600x600.png" alt="" width="235" height="150" /></a><br /><br /><a href="https://www.ebrdknowhowacademy.com/"><img style="display: block; margin-left: auto; margin-right: auto;" title="Artboard 3.png" src="https://www.ebrdknowhowacademy.com/pluginfile.php/1/theme_purity/headerlogo/1705400101/Artboard%203.png" alt="" width="236" height="99" /></a></p>',
            ];

            $site->about_title = [
                'ar' => 'حول البنك الأوروبي لإعادة الإعمار والتنمية',
                'en' => 'About EBRD',
            ];

            $site->about_desc = [
                'ar' => 'في البنك الأوروبي لإعادة الإعمار والتنمية، نعلم أن الشركات الصغيرة والمتوسطة الحجم مهمة للحياة الاقتصادية، في كل من 38 اقتصادًا نعمل فيه. من الحصول على التمويل إلى نصائح بشأن العمل، يسعى البنك الأوروبي لإعادة الإعمار والتنمية إلى مساعدة الشركات على اكتساب المهارات والمعرفة والموارد التي يحتاجونها لاتخاذ الخطوة التالية',
                'en' => 'At the EBRD, we know that vibrant small and medium-sized enterprises are vital to economic life, across the 38 economies where we work. From accessing finance to business advice, the EBRD seeks to help businesses gain the skills, knowledge and resources they need to take the next step.',
            ];

            $site->call_to_action_button_content = [
                'ar' => 'تسجيل',
                'en' => 'Register',
            ];

            $site->copy_right = [
                'ar' => 'حقوق الطبع والنشر لمكيرومنتور 2023. جميع الحقوق محفوظة',
                'en' => 'MicroMentor Copyright 2023. All Rights Reserved',
            ];

            $site->save();

            $partner1 = new SiteImage();
            $partner1->site_id = $site->id;
            $partner1->logo = 'images/sites/ebrd/mc_partner.png';
            $partner1->save();

            $partner2 = new SiteImage();
            $partner2->site_id = $site->id;
            $partner2->logo = 'images/sites/ebrd/micromentor-partner.png';
            $partner2->save();


            $site2= App\Models\Site::create(['url' =>'https://lpcms.almentor.net',
                'title' => 'ebrd','logo' => 'images/sites/ebrd/logo.png','banner' => 'images/sites/ebrd/banner.jpg',
                'short_desc' => 'ebrd','content' => '','about_title' => 'ebrd','about_desc' => 'ebrd','about_image' => 'images/sites/ebrd/about.jpg','page_color' => '#000000','page_background_color' => '#ffffff','call_to_action_button_color' => '#567df4','call_to_action_button_content' => 'ebrd','copy_right' => 'ebrd','linkedin' => 'https://www.linkedin.com/company/micromentor','facebook' => 'https://www.facebook.com/MicroMentor.MENA','instagram' => 'https://www.instagram.com/micromentor_mena/','youtube' => 'https://www.youtube.com/watch?v=PpOuEBnsciw','twitter' => 'https://twitter.com/micromentormena','theme_id' => 2,'country_id' => 1]);
            $site2->title = [
                'ar' => 'البنك الأوروبي لإعادة الإعمار والتنمية',
                'en' => 'EBRD',
            ];

            $site2->short_desc = [
                'ar' => 'هذه المبادرة ممولة من قبل البنك الأوروبي لإعادة الإعمار والتنمية. لقد عقدنا شراكة مع ميكرومينتور وماستركارد لزيادة فرص خدمات الإرشاد في كل من شمال إفريقيا والشرق الأوسط.',
                'en' => 'This initiative is financed by the EBRD. We’re partnering with MicroMentor and the Mastercard Center for Inclusive Growth to increase access to mentoring services across North Africa and the Middle East.',
            ];


            $site2->content = [
                'ar' => '<p><a href="https://www.micromentor.org/ebrd/"><img style="display: block; margin-left: auto; margin-right: auto;" title="EBRD_logo.png" src="https://d2win24dv6pngl.cloudfront.net/media/images/EBRD_blue_15mm_A_blue.max-600x600.png" alt="" width="235" height="150" /></a><br /><br /><a href="https://www.ebrdknowhowacademy.com/"><img style="display: block; margin-left: auto; margin-right: auto;" title="Artboard 3.png" src="https://www.ebrdknowhowacademy.com/pluginfile.php/1/theme_purity/headerlogo/1705400101/Artboard%203.png" alt="" width="236" height="99" /></a></p>',
                'en' => '<p><a href="https://www.micromentor.org/ebrd/"><img style="display: block; margin-left: auto; margin-right: auto;" title="EBRD_logo.png" src="https://d2win24dv6pngl.cloudfront.net/media/images/EBRD_blue_15mm_A_blue.max-600x600.png" alt="" width="235" height="150" /></a><br /><br /><a href="https://www.ebrdknowhowacademy.com/"><img style="display: block; margin-left: auto; margin-right: auto;" title="Artboard 3.png" src="https://www.ebrdknowhowacademy.com/pluginfile.php/1/theme_purity/headerlogo/1705400101/Artboard%203.png" alt="" width="236" height="99" /></a></p>',
            ];

            $site2->about_title = [
                'ar' => 'حول البنك الأوروبي لإعادة الإعمار والتنمية',
                'en' => 'About EBRD',
            ];

            $site2->about_desc = [
                'ar' => 'في البنك الأوروبي لإعادة الإعمار والتنمية، نعلم أن الشركات الصغيرة والمتوسطة الحجم مهمة للحياة الاقتصادية، في كل من 38 اقتصادًا نعمل فيه. من الحصول على التمويل إلى نصائح بشأن العمل، يسعى البنك الأوروبي لإعادة الإعمار والتنمية إلى مساعدة الشركات على اكتساب المهارات والمعرفة والموارد التي يحتاجونها لاتخاذ الخطوة التالية',
                'en' => 'At the EBRD, we know that vibrant small and medium-sized enterprises are vital to economic life, across the 38 economies where we work. From accessing finance to business advice, the EBRD seeks to help businesses gain the skills, knowledge and resources they need to take the next step.',
            ];

            $site2->call_to_action_button_content = [
                'ar' => 'تسجيل',
                'en' => 'Register',
            ];

            $site2->copy_right = [
                'ar' => 'حقوق الطبع والنشر لمكيرومنتور 2023. جميع الحقوق محفوظة',
                'en' => 'MicroMentor Copyright 2023. All Rights Reserved',
            ];

            $site2->save();

            $partner21 = new SiteImage();
            $partner21->site_id = $site2->id;
            $partner21->logo = 'images/sites/ebrd/mc_partner.png';
            $partner21->save();

            $partner22 = new SiteImage();
            $partner22->site_id = $site2->id;
            $partner22->logo = 'images/sites/ebrd/micromentor-partner.png';
            $partner22->save();

        }

    }

}
