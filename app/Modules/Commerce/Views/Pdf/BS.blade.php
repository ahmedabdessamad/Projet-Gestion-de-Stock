<html>
<head>
<title>Bon de sortie {{$mission->numero}}</title>
<style>

</style>
</head>

<body>
	<table>
		<tr>
			<td style="width: 50%;">
		{{ $mission->date}} <br />

        TAC-TIC
        TechnoparkElghazela BP 129, 2088 Cité Elghazela - Ariana
        Tél: 29 48 44 25 / 29 48 44 26 <br />
        Mail:<span style="color: blue;">contact@tac-tic.net</span>
			</td>
		    <td style="width: 50%;">
		     <img style="float: right;" src="storages/images/logo/logo.png">
		    </td>
		</tr>
	</table>


<div style="text-align: center; margin-top: 100px;">
<h1>BON DE LIVRAISON</h1>
From « TAC-TIC » To « TUNISIE TELECOM » <br />
Destination : {{$mission->destination->name}}
</div><br />
<table border="1" style="width: 100%;">
	<tr style="background-color: yellow;">
		<td>Produit</td>
		<td>Reference</td>
		<td>Quantite</td>
	</tr>
	@foreach ($equipements as $equipement)
	  <tr>
	  	<td>{{$equipement->categorie->name}}</td>
	  	<td>{{$equipement->categorie->reference}}</td>
	  	<td>1</td>
	  </tr>
	@endforeach
</table><br />
<table border="1" style="width: 100%;">
	<tr style="background-color: yellow;">
		<td>Non de l’intervenant</td>
		<td>Matricule Véhicule</td>
	</tr>
	@foreach ($speakers as $speaker)
	  <tr>
	  	<td>{{$speaker->first_name}} {{$speaker->last_name}}</td>
	  	<td></td>
	  </tr>
	@endforeach
</table><br />
<div style="float: right;">
Signature et cachet
</div>
</body>

</html>