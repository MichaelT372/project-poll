<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
	protected $fillable = [
		'title',
		'slug'
	];

	protected static function boot()
	{
	    Poll::creating(function ($poll) {
	        if(empty($poll->slug)) {
	            $poll->slug = $poll->makeSlugFromTitle($poll->title);
	        }
	        return true;
	    });
	    //static::bootTraits();
	}

	public function options()
	{
		return $this->hasMany('App\Option');
	}

	/**
	 * Set the poll's title, adds ? if needed.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public function setTitleAttribute($title)
	{
		if (substr($title, -1) != '?') {
			return $this->attributes['title'] = $title . '?';
		}

		return $this->attributes['title'] = $title;
	}

	/**
	 * Create a title slug.
	 *
	 * @param  string $title
	 * @return string
	 */

	 public function makeSlugFromTitle($title)
	 {
	     $slug = str_slug($title);
	     $count = $this->where('slug', 'LIKE', "%$slug%")->count();
	     return $count ? "{$slug}-{$count}" : $slug;
	 }

}
