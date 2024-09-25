<div style="margin-top: 10px; border: 1px solid #ccc; 
background-color: #fff; padding: 20px; 
border-radius: 10px;">
       
       @isset($label)
       <strong>{{ $label }}</strong><br>
       @endisset

       {{ $slot }}
    </div>