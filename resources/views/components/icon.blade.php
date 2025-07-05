<div>
    @props(['nombreIcono'])

    {!! file_get_contents(public_path("icons/{$nombreIcono}.svg")) !!}
</div>