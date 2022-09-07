<!-- Usa o HTML/CSS/JS do layouts/padrao.blade.php -->
@extends('./layouts.padrao')

<!-- Define o titulo da pagina/view -->
@section('title', 'Quadro de Avisos')

<!-- Usa o sidebar do layout padrao (layouts/padrao.blade.php) -->
@section('sidebar')
    @parent
    ------/////------
@endsection

<!-- Para inserir o conteudo no layout padrao (layouts/padrao.blade.php)-->
@section('content')
  <h1>Quadro de avisos</h1>
  <br>
  <br>

  <!-- Looping para vetor do blade -->
  @foreach($avisos as $aviso)

    <!-- IF no blade-->
    @if($aviso['exibir'])
      {{$aviso['data']}}: {{$aviso['aviso']}}<br>
    @endif

  @endforeach
  <br><br>
  <?php
  // Da pra usar php puro
    foreach ($avisos as $aviso) {

      if($aviso['exibir'])
        echo "{$aviso['data']} : {$aviso['aviso']} <br> ";
      else
        echo 'Não há avisos <br>';
    }
  ?>

@endsection
