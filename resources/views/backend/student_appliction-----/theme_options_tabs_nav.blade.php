<ul class="tabs-nav">
	{{-- <li class=""><a href="{{ route('admin.student_appliction_program_edit', $s_appliction->id) }}" style="color: var(--theme_text_color)"><i class="fa fa-edit"></i>{{ __('Program Info') }}</a></li> --}}
	<li class=""><a href="{{ route('admin.student_appliction_edit', $s_appliction->id) }}" style="color: var(--theme_text_color)"><i class="fa fa-edit"></i>{{ __('Personal Info') }}</a></li>
	<li><a href="{{ route('admin.student_appliction_edit_family', $s_appliction->id) }}" style="color: var(--theme_text_color)"><i class="fa fa-edit"></i>{{ __('Family Info') }}</a></li>
	<li><a href="{{ route('admin.student_appliction_document', $s_appliction->id) }}" style="color: var(--theme_text_color)"><i class="fa fa-edit"></i>{{ __('Documents') }}</a></li>
</ul>

