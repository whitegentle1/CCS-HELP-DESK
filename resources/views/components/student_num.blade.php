<p>
    {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
</p>
