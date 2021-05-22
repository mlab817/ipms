<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	  protected $fillable = [
	  	'project_id',
	  	'typology_id',
	  	'cip',
	  	'cip_type_id',
	  	'trip',
	  	'within_period',
	  	'readiness_id',
	  	'reviewed_by',
	  	'remarks'
	  ];
  
		public function project(): BelongsTo
		{
			return $this->belongsTo(Project::class);
		}

		public function cip_type(): BelongsTo
		{
			return $this->belongsTo(CipType::class);
		}

		public function typology(): BelongsTo
		{
			return $this->belongsTo(Typology::class);
		}

		public function reviewer(): BelongsTo
		{
			return $this->belongsTo(User::class,'reviewed_by','id');
		}

		public function readiness(): BelongsTo
		{
			return $this->belongsTo(Readiness::class);
		}

		// BelongsToMany Relations
		public function sustainable_development_goals(): BelongsToMany
		{
			return $this->belongsToMany(SustainableDevelopmentGoal::class,'review_sdg','review_id','sdg_id');
		}

		public function ten_point_agenda(): BelongsToMany
		{
			return $this->belongsToMany(TenPointAgenda::class,'review_tpa','review_id','tpa_id');
		}

		public function bases(): BelongsToMany
		{
			return $this->belongsToMany(Basis::class,'review_basis','review_id','basis_id');
		}

		public function paradigms(): BelongsToMany
		{
			return $this->belongsToMany(Paradigm::class,'review_paradigm','review_id','paradigm_id');
		}

		public function pdp_indicators(): BelongsToMany
		{
			return $this->belongsToMany(PdpIndicator::class,'review_pdp_indicator','review_id','pdp_indicator_id');
		}

		public function pdp_chapters(): BelongsToMany
		{
			return $this->belongsToMany(PdpChapter::class,'review_pdp_chapter','review_id','pdp_chapter_id');
		}

		public function getSelectedBasesAttribute()
	    {
	      return $this->bases ? $this->bases->pluck('id')->toArray() : null;
	    }
	    
		public function getSelectedSustainableDevelopmentGoalsAttribute()
	    {
	      return $this->sustainable_development_goals ? $this->sustainable_development_goals->pluck('id')->toArray() : null;
	    }

		public function getSelectedParadigmsAttribute()
	    {
	      return $this->paradigms ? $this->paradigms->pluck('id')->toArray() : null;
	    }

		public function getSelectedTenPointAgendaAttribute()
	    {
	      return $this->ten_point_agenda ? $this->ten_point_agenda->pluck('id')->toArray() : null;
	    }

		public function getSelectedPdpChaptersAttribute()
	    {
	      return $this->pdp_chapters ? $this->pdp_chapters->pluck('id')->toArray() : null;
	    }

		public function getSelectedPdpIndicatorsAttribute()
	    {
	      return $this->pdp_indicators ? $this->pdp_indicators->pluck('id')->toArray() : null;
	    }
}
