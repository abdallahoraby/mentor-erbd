<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

/**
 * Class Site
 * @package App\Models
 * @version September 18, 2023, 9:03 pm UTC
 * @property string $url
 * @property integer $theme_id
 * @property string $logo
 * @property string $banner
 * @property string $title
 * @property string $short_desc
 * @property string $content
 * @property string $about_title
 * @property string $about_desc
 * @property string $about_image
 * @property string $page_color
 * @property string $page_background_color
 * @property string $call_to_action_button_color
 * @property string $call_to_action_button_content
 * @property string $copy_right
 * @property string $linkedin
 * @property string $facebook
 * @property string $instagram
 * @property string $youtube
 * @property string $twitter
 */
class Site extends Model
{
    use SoftDeletes;

    use HasFactory;

    use HasTranslations;
    public $translatable = ['title','short_desc','content','about_title','about_desc','copy_right','call_to_action_button_content'];

    public $table = 'sites';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'url',
        'theme_id',
        'country_id',
        'logo',
        'banner',
        'title',
        'short_desc',
        'content',
        'about_title',
        'about_desc',
        'about_image',
        'page_color',
        'page_background_color',
        'call_to_action_button_color',
        'call_to_action_button_content',
        'copy_right',
        'linkedin',
        'facebook',
        'instagram',
        'youtube',
        'twitter'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'url' => 'string',
        'theme_id' => 'integer',
        'logo' => 'string',
        'banner' => 'string',
        'title' => 'string',
        'short_desc' => 'string',
        'about_title' => 'string',
        'about_desc' => 'string',
        'about_image' => 'string',
        'page_color' => 'string',
        'page_background_color' => 'string',
        'call_to_action_button_color' => 'string',
        'call_to_action_button_content' => 'string',
        'copy_right' => 'string',
        'linkedin' => 'string',
        'facebook' => 'string',
        'instagram' => 'string',
        'youtube' => 'string',
        'twitter' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'url' => 'required',
        'theme_id' => 'exists:themes,id',
        'logo' => 'image',
        'banner' => 'image'
    ];

    public function partners(){
        return $this->hasMany(SiteImage::class);
    }


}
