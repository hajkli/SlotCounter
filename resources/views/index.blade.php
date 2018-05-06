<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zadanie</title>
	    <script
			    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			    integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
			    crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
	        table{
		        width: 150px;
	        }
	        table td{
		        border:1px solid black;
		        background: #c1c1c1;
		        padding: 5px;
		        height: 50px;
	        }
	        table td.occupied{
		        background: red;
	        }
	        table td.compatible{
		        background: green;
	        }
        </style>
    </head>
    <body>

	<h2>Vase zariadenie</h2>
    <table>

	    @foreach($positions as $position)
		    <tr>
				<td class="
				    @if ($position['occupied'] == 1))
					    occupied
				    @else
						compatible
					@endif
				">
					Slot: {{$position['id']}}
				</td>
		    </tr>
	    @endforeach
    </table>


	<h2>Ako velke zariadenie chcete vlozit do racku?</h2>

    <form method="POST" enctype="multipart/form-data" action="">
	    {{ csrf_field() }}
	    <label for="size"> Veľkosť zariadenia:
	    <input type="text" name='size' id='size'></label>
	    <input type='submit' id="submit" value='Poslat'>
	    <div style="display: none" id="validationText">Zadajte prosim cislo</div>

    </form>
    @if (empty($isCompatible))
	    <p>
		    Zariadenie nie je mozne umiestnit na ziadnu poziciu
	    </p>
	@elseif ($isCompatible[0] == 'notSent')
		<p>
			Zadajte velkost zariadenia
		</p>
    @else
	    <p>
		    <strong>ID pozicii kde je mozne zariadenie o velkosti {{$sizeOfServer}} umiesnit:</strong>
	    </p>
		<ul>
		    @foreach($isCompatible as $slot)
			    <li>ID: {{$slot}}<br></li>
		    @endforeach
		</ul>
    @endif







    <script>
	    $( "#size" ).change(function() {
		    if($.isNumeric(this.value)){
			    $('#submit').attr("disabled", false);
			    $('#validationText').css('display', 'none');
		    }else{
			    $('#submit').attr("disabled", true);
			    $('#validationText').css('display', 'block');

		    }
	    });
    </script>



    </body>
</html>
