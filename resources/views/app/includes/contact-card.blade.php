<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
	<div class="contact">
		<div class="contact-avatar">
			{{ $contact->initials }}
		</div>
		<span class="contact-name"><a href="{{ $route }}">{{ $contact->name }}</a></span>
		<span class="contact-email">{{ $contact->email }}</span>
	</div>
</div>
