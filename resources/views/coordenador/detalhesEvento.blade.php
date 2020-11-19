@extends('layouts.app')
@section('sidebar')

<div class="wrapper">
    <div class="sidebar">
        <h2>{{{$evento->nome}}}</h2>
        <ul>
            {{-- @can('isCoordenador', $evento) --}}
                <a id="informacoes" href="{{ route('coord.informacoes', ['eventoId' => $evento->id]) }}">
                    <li>
                        <img src="{{asset('img/icons/info-circle-solid.svg')}}" alt=""> <h5> Informações</h5>
                    </li>
                </a>

            {{-- @endcan --}}
            {{-- @can('isCoordenador', $evento) --}}


            <a id="trabalhos">
                <li>
                    <img src="{{asset('img/icons/file-alt-regular.svg')}}" alt=""><h5>Submissões</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
                </li>

                <div id="dropdownTrabalhos"  @if(request()->is('coord/evento/trabalhos*')) style='background-color: gray;display: block;' @else  style='background-color: gray' @endif>
                    @can('isCoordenadorOrComissao', $evento)
                        <a id="submissoesTrabalhos" href="{{ route('coord.definirSubmissoes', ['eventoId' => $evento->id]) }}">
                            <li>
                                <img src="{{asset('img/icons/plus-square-solid.svg')}}" alt=""><h5>Tipo</h5>
                            </li>
                        </a>
                        <a id="resultadosTrabalhos" href="{{ route('coord.resultados', ['id' => $evento->id]) }}">
                            <li>
                                <img src="{{asset('img/icons/plus-square-solid.svg')}}" alt=""><h5>Resultado</h5>
                            </li>
                        </a>
                        <a id="listarTrabalhos" href="{{ route('coord.listarTrabalhos', ['eventoId' => $evento->id]) }}">
                            <li>
                                <img src="{{asset('img/icons/list.svg')}}" alt=""><h5>Listar Trabalhos</h5>
                            </li>
                        </a>
                    @endcan
                    @can('isRevisorComAtribuicao')
                        <a id="avaliarTrabalhos" href="{{ route('coord.listarTrabalhos', ['eventoId' => $evento->id]) }}">
                            <li>
                                <img src="{{asset('img/icons/list.svg')}}" alt=""><h5>Avaliação</h5>
                            </li>
                        </a>
                    @endcan
                </div>
            </a>

            {{-- @endcan --}}

            <a id="areas">
                
                <li>
                    <img src="{{asset('img/icons/area.svg')}}" alt=""><h5> Áreas</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
                </li>
                <div id="dropdownAreas"  @if(request()->is('coord/evento/areas*')) style='background-color: gray;display: block;' @else  style='background-color: gray' @endif>
                    <a id="cadastrarAreas" href="{{ route('coord.cadastrarAreas', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/plus-square-solid.svg')}}" alt=""><h5> Cadastrar Áreas</h5>
                        </li>
                    </a>
                    <a id="listarAreas" href="{{ route('coord.listarAreas', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/list.svg')}}" alt=""><h5> Listar Áreas</h5>
                        </li>
                    </a>
                </div>

            </a>

            {{-- @can('isCoordenador', $evento) --}}

            <a id="revisores">
                <li>
                    <img src="{{asset('img/icons/glasses-solid.svg')}}" alt=""><h5>Revisores</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
                </li>
                <div id="dropdownRevisores" @if(request()->is('coord/evento/revisores*')) style='background-color: gray;display: block;' @else  style='background-color: gray' @endif>
                    <a id="cadastrarRevisores" href="{{ route('coord.cadastrarRevisores', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/user-plus-solid.svg')}}" alt=""><h5> Cadastrar Revisores</h5>
                        </li>
                    </a>
                    {{-- <a id="adicionarRevisores" href="{{ route('coord.adicionarRevisores', ['id' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/user-plus-solid.svg')}}" alt=""><h5> Adicionar Revisores</h5>
                        </li>
                    </a> --}}
                    <a id="listarRevisores" href="{{ route('coord.listarRevisores', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/list.svg')}}" alt=""><h5> Listar Revisores</h5>
                        </li>
                    </a>
                    <a id="listarUsuarios" href="{{ route('coord.listarUsuarios', ['evento_id' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/list.svg')}}" alt=""><h5> Listar Usuários</h5>
                        </li>
                    </a>
                </div>
            </a>
            {{-- @endcan --}}
            <a id="comissao" >
                <li>
                    <img src="{{asset('img/icons/user-tie-solid.svg')}}" alt=""><h5>Comissão Cientifica</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
                </li>
                <div id="dropdownComissao" @if(request()->is('coord/evento/comissaoCientifica*')) style='background-color: gray;display: block;' @else  style='background-color: gray' @endif>
                    <a id="cadastrarComissao" href="{{ route('coord.cadastrarComissao', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/user-plus-solid.svg')}}" alt=""><h5> Cadastrar membro</h5>
                        </li>
                    </a>
                    {{-- @can('isCoordenador', $evento) --}}
                    <a id="definirCoordComissao" href="{{ route('coord.definirCoordComissao', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/crown-solid.svg')}}" alt=""><h5> Definir Coordenador</h5>
                        </li>
                    </a>
                    {{-- @endif --}}
                    <a id="listarComissao" href="{{ route('coord.listarComissao', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/list.svg')}}" alt=""><h5> Listar Comissão</h5>
                        </li>
                    </a>
                </div>
            </a>
            <a id="comissaoOrganizadora" >
                <li>
                    <img src="{{asset('img/icons/user-tie-solid.svg')}}" alt=""><h5>Comissão Organizadora</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
                </li>
                <div id="dropdownComissaoOrganizadora" @if(request()->is('coord/evento/comissaoOrganizadora*')) style='background-color: gray;display: block;' @else  style='background-color: gray' @endif>
                    <a id="cadastrarComissaoOrganizadora" href="{{route('coord.comissao.organizadora.create', ['id' => $evento->id])}}">
                        <li>
                            <img src="{{asset('img/icons/user-plus-solid.svg')}}" alt=""><h5> Cadastrar membro</h5>
                        </li>
                    </a>
                    {{-- @can('isCoordenador', $evento) --}}
                    <a id="definirCoordComissaoOrganizadora" href="{{route('coord.definir.coordComissaoOrganizadora', ['id' => $evento])}}">
                        <li>
                            <img src="{{asset('img/icons/crown-solid.svg')}}" alt=""><h5> Definir Coordenador</h5>
                        </li>
                    </a>
                    {{-- @endif --}}
                    <a id="listarComissaoOrganizadora" href="{{route('coord.listar.comissaoOrganizadora', ['id' => $evento])}}">
                        <li>
                            <img src="{{asset('img/icons/list.svg')}}" alt=""><h5> Listar Comissão</h5>
                        </li>
                    </a>
                </div>
            </a>
            <a id="modalidades">
                <li>
                    <img src="{{asset('img/icons/sitemap-solid.svg')}}" alt=""><h5>Modalidades</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
                </li>
                <div id="dropdownModalidades" @if(request()->is('coord/evento/modalidade*')) style='background-color: gray;display: block;' @else  style='background-color: gray' @endif>
                    <a id="cadastrarModalidade" href="{{ route('coord.cadastrarModalidade', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/plus-square-solid.svg')}}" alt=""><h5> Cadastrar Modalidade</h5>
                        </li>
                    </a>
                    <a id="listarModalidade" href="{{ route('coord.listarModalidade', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/list.svg')}}" alt=""><h5> Listar Modalidades</h5>
                        </li>
                    </a>
                    <a id="cadastrarCriterio" href="{{ route('coord.cadastrarCriterio', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/plus-square-solid.svg')}}" alt=""><h5> Cadastrar Critérios</h5>
                        </li>
                    </a>
                    <a id="listarCriterios" href="{{ route('coord.listarCriterios', ['eventoId' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/list.svg')}}" alt=""><h5> Listar Criterios</h5>
                        </li>
                    </a>
                </div>
            </a>
            {{-- @can('isCoordenador', $evento) --}}
            <a id="programacao">
                <li>
                    <img src="{{asset('img/icons/slideshow.svg')}}" alt=""><h5>Programação</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
                </li>
                <div id="dropdownProgramacao" @if(request()->is('coord/evento/atividade*') || request()->is('inscricoes*')) style='background-color: gray;display: block;' @else  style='background-color: gray' @endif>
                    <a id="cadastrarModalidade" href="{{ route('coord.atividades', ['id' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/plus-square-solid.svg')}}" alt=""><h5> Atividades</h5>
                        </li>
                    </a> 
                    <a id="cadastrarModalidade" href="{{ route('inscricoes', ['id' => $evento->id]) }}">
                        <li>
                            <img src="{{asset('img/icons/edit-regular-white.svg')}}" alt=""><h5>Inscrições</h5>
                        </li>
                    </a>                       
                </div>
            </a>

            <a id="eventos">
              <li>
                  <img src="{{asset('img/icons/palestrante.svg')}}" alt=""><h5>Evento</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
              </li>
              <div id="dropdownEvento" @if(request()->is('coord/evento/eventos*')) style='background-color: gray;display: block;' @else  style='background-color: gray' @endif>
                  <a id="editarEtiqueta" href="{{ route('coord.editarEtiqueta', ['eventoId' => $evento->id]) }}">
                      <li>
                          <img src="{{asset('img/icons/edit-regular-white.svg')}}" alt=""><h5>Etiquetas Eventos</h5>
                      </li>
                  </a>
                  <a id="editarEtiquetaSubTrabalhos"  href="{{ route('coord.etiquetasTrabalhos', ['eventoId' => $evento->id]) }}">
                    <li>
                        <img src="{{asset('img/icons/edit-regular-white.svg')}}" alt=""><h5>Etiquetas Trabalho</h5>
                    </li>
                  </a>
              </div>
            </a>
            <a id="publicar">
                <li>
                  <img src="{{ asset('img/icons/publish.svg') }}" alt=""><h5>Publicar</h5><img class="arrow" src="{{asset('img/icons/arrow.svg')}}">
                </li>
                <div id="dropdownPublicar" style="background-color: gray">
                  <a id="publicarEvento" onclick="habilitarEvento()">
                    <form id="habilitarEventoForm" method="GET" action="{{route('evento.habilitar', ['id' => $evento->id])}}"></form>
                      <li>
                          <img src="{{asset('img/icons/alto-falante.svg')}}" alt=""><h5> Publicar Evento</h5>
                      </li>
                  </a>
                  <a id="desabilitarEventoPublicado" onclick="desabilitarEvento()">
                    <form id="desabilitarEventoForm" method="GET" action="{{route('evento.desabilitar', ['id' => $evento->id])}}"></form>
                      <li>
                          <img src="{{asset('img/icons/alto-falante-nao.svg')}}" alt=""><h5> Desfazer publicação</h5>
                      </li>
                  </a>
              </div>
            </a>
            {{-- @endcan --}}
        </ul>
    </div>


</div>
@endsection
@section('content')

<div class="main_content">
  {{-- mensagem de confimação --}}
  @if(session('mensagem'))
    <div class="col-md-12" style="margin-top: 5px;">
        <div class="alert alert-success">
            <p>{{session('mensagem')}}</p>
        </div>
    </div>
  @endif
    {{-- {{ $evento->id ?? '' }} --}}
    <div>
        @error('comparacaocaracteres')
          @include('componentes.mensagens')
        @enderror
    </div>
    <div>
        @error('comparacaopalavras')
          @include('componentes.mensagens')
        @enderror
    </div>
    <div>
        @error('marcarextensao')
          @include('componentes.mensagens')
        @enderror
    </div>
    <div>
        @error('caracteresoupalavras')
          @include('componentes.mensagens')
        @enderror
    </div>
    <div>
        @error('semcaractere')
          @include('componentes.mensagens')
        @enderror
    </div>
    <div>
        @error('sempalavra')
          @include('componentes.mensagens')
        @enderror
    </div>
    
    @yield('menu')

    @hasSection ('script')
        @yield('script')
    @endif

</div>
<input type="hidden" name="trabalhoIdAjax" value="1" id="trabalhoIdAjax">
<input type="hidden" name="modalidadeIdAjax" value="1" id="modalidadeIdAjax">
<input type="hidden" name="criterioIdAjax" value="1" id="criterioIdAjax">

@endsection
@section('javascript')
  <script type="text/javascript" >
    // Adicionar novo criterio
    var contadorOpcoes = 0;
    $(document).ready(function(){
        $('#addCriterio').click(function(){
            if ($('#modalidade').val() != null) {
                linha = montarLinhaInput();
                $('#criterios').append(linha);
                contadorOpcoes++;
            } else {
                alert("Escolha uma modalidade");
            }
        });
        @if (old('criarCupom') != null) 
            $('#li_cuponsDeDesconto').click();
        @elseif (old('criarCategoria') != null)
            $('#li_categoria_participante').click();
        @elseif (old('novoCampoFormulario') != null)
            $('#li_formulari_inscricao').click();
        @elseif (old('novaPromocao') != null)
            $('#li_promocoes').click();
        @else
            $('#li_categoria_participante').click();
        @endif
        
    });

    function exibirLimite(id, input) {
        var caracteres = document.getElementById('caracteres' + id);
        var palavras = document.getElementById('palavras' + id);
        if (input.value == "caracteres") {
            caracteres.style.display    = "block";
            palavras.style.display      = "none";
        } else {
            caracteres.style.display    = "none";
            palavras.style.display      = "block";
        }
    }

    function exibirTiposArquivo(id, input) {
        var tiposDeArquivo = document.getElementsByClassName('tiposDeArquivos' + id);
        // console.log(tiposDeArquivo);
        if (input.checked) {
            tiposDeArquivo[0].style.display = "block";
            tiposDeArquivo[1].style.display = "block";
        } else {
            tiposDeArquivo[0].style.display = "none";
            tiposDeArquivo[1].style.display = "none";  
        }
    }

    $(document).ready(function($){
        $('.cep').mask('00000-000');
        $(".apenasLetras").mask("#", {
            maxlength: false,
            translation: {
                '#': {pattern: /[A-zÀ-ÿ ]/, recursive: true}
            }
        });
        $('.numero').mask('0000000');
    });

    // Remover Criterio
    $(document).on('click','.delete',function(){
        $(this).closest('.row').remove();
            return false;
    });

    // Montar div para novo criterio
    function montarLinhaInput(){
        return  "<div class="+"row"+" style='position:relative; top:10px;'>"+
                    "<div class="+"col-sm-6"+">"+
                        "<label>Nome</label>"+
                        "<input"+" type="+'text'+" style="+"margin-bottom:10px"+" class="+'form-control'+" name="+'nomeCriterio'+contadorOpcoes+" placeholder="+"Nome"+" required>"+
                    "</div>"+
                    "<div class="+"col-sm-5"+">"+
                        "<label>Peso</label>"+
                        "<input"+" type="+'number'+" style="+"margin-bottom:10px"+" class="+'form-control'+" name="+'pesoCriterio'+contadorOpcoes+" placeholder="+"Peso"+" required>"+
                    "</div>"+
                    "<div class="+"col-sm-1"+">"+
                        "<a href="+"#"+" class="+"delete"+">"+
                            "<img src="+"/img/icons/lixo.png"+" style="+"width:25px;margin-top:35px"+">"+
                        "</a>"+
                    "</div>"+
                    "<div class='container'>" +
                        "<div class='row'>" +
                            "<div class='col-sm-12'>" +
                                "<h6>Opções para avaliar<img src='{{asset('/img/icons/interrogacao.png')}}' width='15px' style='position:relative; left:5px; border: solid 1px; border-radius:50px; padding: 2px;' title='Essas opções serão exibidas ao revisor na hora da avaliação do trabalho'></h6>" +
                            "</div>" +
                            "<div class='col-sm-7'>" +
                                "<input"+" type="+'text'+" style="+"margin-bottom:10px"+" class="+'form-control'+" name="+'opcaoCriterio_'+contadorOpcoes+'[]'+" placeholder="+"Opção"+" required>"+
                            "</div>" +
                            "<div class='col-sm-4'>" +
                                "<input"+" type="+'number'+" style="+"margin-bottom:10px"+" class="+'form-control'+" name="+'valor_real_opcao_'+contadorOpcoes+'[]'+" placeholder="+"Valor entre 0 a 10"+" required min='0.00' onchange='validandoValorReal(this)'>"+
                            "</div>" +
                            "<div class='col-sm-1'>" +
                                "<a href="+"#"+" onclick="+"addOpcaoCriterio(this,"+contadorOpcoes+")"+">"+
                                    "<img src="+"{{ asset('/img/icons/plus-square-solid_black.svg')}}"+" style="+"width:25px;margin-top:5px"+">"+
                                "</a>" +
                            "</div>" +
                        "</div>" +
                        "<hr>" +
                    "</div>" +
                "</div>";
    }

    function validandoValorReal(input) {
        // console.log(input);
        if (input.value > 10 || input.value < 0) {
            alert("O valor da opção deve estar entre 0 e 10");
            input.value = 0;
        } 
    }
    function montarLinhaOpcaoCriterio(idName) {
        return  "<div class='col-sm-7'>" +
                    "<input"+" type="+'text'+" style="+"margin-bottom:10px"+" class="+'form-control'+" name="+'opcaoCriterio_'+idName+'[]'+" placeholder="+"Opção"+" required>"+
                "</div>" +
                "<div class='col-sm-4'>" +
                    "<input"+" type="+'number'+" style="+"margin-bottom:10px"+" class="+'form-control'+" name="+'valor_real_opcao_'+idName+'[]'+" placeholder="+"Valor entre 0 a 10"+" required min='0.0' onchange='validandoValorReal(this)'>"+
                "</div>";
    }

    function addOpcaoCriterio(elem, idName){
        linhaDeOpcaoCriterio = montarLinhaOpcaoCriterio(idName);
        $(elem).closest('.row').append(linhaDeOpcaoCriterio);
    }

    // Função para retornar campos de edição de etiquetas para submissão de trabalhos ao default.
    function default_formsubmtraba(){
        return confirm('Tem certeza que deseja voltar a ordem e valores padrões dos campos?');
    }

    // Função para retornar campos de edição card de evento ao default.
    function default_edicaoCardEvento(){
        return confirm('Tem certeza que deseja restaurar os valores padrões dos campos?');
    }



    // Ordenar campos de submissão de trabalhos
    $(document).ready(function(){
        $('.move-down').click(function(){
            if (($(this).next()) && ($(this).parents("#bisavo").next().attr('id') == "bisavo")) {
                console.log("IF MOVE-DOWN");
                var t = $(this);
                t.parents("#bisavo").animate({top: '20px'}, 500, function(){
                    t.parents("#bisavo").next().animate({top: '-20px'}, 500, function(){
                        t.parents("#bisavo").css('top', '0px');
                        t.parents("#bisavo").next().css('top', '0px');
                        t.parents("#bisavo").insertAfter(t.parents("#bisavo").next());
                    });
                });
                // $(this).parents("#bisavo").insertAfter($(this).parents("#bisavo").next());
            }
            else {
                console.log("ELSE MOVE-DOWN");
            }
        });
        $('.move-up').click(function(){
            if (($(this).prev()) && ($(this).parents("#bisavo").prev().attr('id') == "bisavo")) {
                console.log("IF MOVE-UP");
                var t = $(this);
                t.parents("#bisavo").animate({top: '-20px'}, 500, function(){
                    t.parents("#bisavo").prev().animate({top: '20px'}, 500, function(){
                        t.parents("#bisavo").css('top', '0px');
                        t.parents("#bisavo").prev().css('top', '0px');
                        t.parents("#bisavo").insertBefore(t.parents("#bisavo").prev());
                    });
                });
                // $(this).parents("#bisavo").insertBefore($(this).parents("#bisavo").prev());
            }
            else {
                console.log("ELSE MOVE-UP");
            }
        });
    });

    // Exibir ou ocultar opções de Texto na criação de modalidade - com checkbox
    $(document).ready(function() {
        $('input:checkbox[class="form-check-input incluirarquivo"]').on("change", function() {
            if (this.checked) {
                $("#area-template").show();
                $("#tipo-arquivo").show();
            } else {
                $("#area-template").hide();
                $("#tipo-arquivo").hide();
            }
        });
    });

    $(document).ready(function() {
        $('input:checkbox[class="form-check-input incluirarquivoEdit"]').on("change", function() {
            if (this.checked) {
                $("#area-templateEdit").show();
                $("#tipo-arquivoEdit").show();
            } else {
                $("#area-templateEdit").hide();
                $("#tipo-arquivoEdit").hide();
            }
        });
    });


    $(document).ready(function() {
        $('input:radio[name="limit"]').on("change", function() {
            if (this.checked && this.value == 'limit-option1') {
                $("#min-max-caracteres").show();
                $("#min-max-palavras").hide();
            } else {
                $("#min-max-palavras").show();
                $("#min-max-caracteres").hide();
            }
        });
    });

    $(document).ready(function() {
        $('input:radio[name="limitEdit"]').on("change", function() {
            if (this.checked && this.value == 'limit-option1Edit') {
                $("#min-max-caracteresEdit").show();
                $("#min-max-palavrasEdit").hide();
            } else {
                $("#min-max-palavrasEdit").show();
                $("#min-max-caracteresEdit").hide();
            }
        });
    });

    // Exibir ou ocultar campos de edição de etiquetas de eventos
    $(document).ready(function() {
        $('#botao-editar-nome').on("click", function() {
            $("#etiqueta-nome-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-descricao').on("click", function() {
            $("#etiqueta-descricao-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-tipo').on("click", function() {
            $("#etiqueta-tipo-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-datas').on("click", function() {
            $("#etiqueta-data-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-submissoes').on("click", function() {
            $("#etiqueta-submissoes-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-endereco').on("click", function() {
            $("#etiqueta-endereco-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-modulo-inscricao').on("click", function() {
            $("#etiqueta-modulo-inscricao-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-modulo-programacao').on("click", function() {
            $("#etiqueta-modulo-programacao-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-modulo-organizacao').on("click", function() {
            $("#etiqueta-modulo-organizacao-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-etiqueta-regra').on("click", function() {
            $("#etiqueta-baixar-regra-evento").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-etiqueta-template').on("click", function() {
            $("#etiqueta-baixar-template-evento").toggle(500);
        });
    });
    // Fim

    // Exibir ou ocultar campos de edição de etiquetas de trabalhos
    $(document).ready(function() {
        $('#botao-editar-titulo').on("click", function() {
            $("#etiqueta-titulo-trabalho").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-autor').on("click", function() {
            $("#etiqueta-autor-trabalho").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-coautor').on("click", function() {
            $("#etiqueta-coautor-trabalho").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-resumo').on("click", function() {
            $("#etiqueta-resumo-trabalho").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-area').on("click", function() {
            $("#etiqueta-area-trabalho").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-upload').on("click", function() {
            $("#etiqueta-upload-trabalho").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-regras').on("click", function() {
            $("#etiqueta-regras-trabalho").toggle(500);
        });
    });

    $(document).ready(function() {
        $('#botao-editar-templates').on("click", function() {
            $("#etiqueta-templates-trabalho").toggle(500);
        });
    });
    // Fim

  function habilitarEvento() {
    var form = document.getElementById("habilitarEventoForm");
    form.submit();
  }

  function desabilitarEvento() {
    var form = document.getElementById("desabilitarEventoForm");
    form.submit();
  }

  function trabalhoId(x){
    document.getElementById('trabalhoIdAjax').value = x;
  }

  function modalidadeId(x){
    document.getElementById('modalidadeIdAjax').value = x;
  }

  function criterioId(x){
    document.getElementById('criterioIdAjax').value = x;
  }

  $(function(){
    $('#areas').click(function(){
        $('#dropdownAreas').slideToggle(200);
    });
    $('#revisores').click(function(){
            $('#dropdownRevisores').slideToggle(200);
    });
    $('#comissao').click(function(){
            $('#dropdownComissao').slideToggle(200);
    });
    $('#comissaoOrganizadora').click(function(){
            $('#dropdownComissaoOrganizadora').slideToggle(200);
    });
    $('#modalidades').click(function(){
            $('#dropdownModalidades').slideToggle(200);
    });
    $('#eventos').click(function(){
            $('#dropdownEvento').slideToggle(200);
    });
    $('#programacao').click(function(){
            $('#dropdownProgramacao').slideToggle(200);
    });
    $('#trabalhos').click(function(){
            $('#dropdownTrabalhos').slideToggle(200);
    });
    $('#publicar').click(function(){
            $('#dropdownPublicar').slideToggle(200);
    });
    $('.botaoAjax').click(function(e){
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
          }
      });
       jQuery.ajax({
          url: "{{ route('detalhesTrabalho') }}",
          method: 'get',
          data: {
             // name: jQuery('#name').val(),
             // type: jQuery('#type').val(),
             // price: jQuery('#price').val()
             trabalhoId: $('#trabalhoIdAjax').val()
          },
          success: function(result){
            console.log(result);
            // result = JSON.parse(result[0]);
            // console.log(result.titulo);
            $('#tituloTrabalhoAjax').html(result.titulo);
            $('#resumoTrabalhoAjax').html(result.resumo);
            $('#distribuicaoManualTrabalhoId').val($('#trabalhoIdAjax').val());
            $('#removerRevisorTrabalhoId').val($('#trabalhoIdAjax').val());
            // console.log(result.revisores);
            var container = $('#cblist');
            container.empty();
            result.revisores.forEach(addCheckbox);
            var container = $('#selectRevisorTrabalho');
            container.empty();
            addDisabledOptionToSelect();
            result.revisoresDisponiveis.forEach(addOptionToSelect);

          }});
          jQuery.ajax({
          url: "{{ route('findModalidade') }}",
          method: 'get',
          data: {
             modalidadeId: $('#modalidadeIdAjax').val()
          },
          success: function(result){
            console.log(result);
            // document.getElementById('nomeModalidadeEdit').value = result.nome;
            $('#modalidadeEditId').val(result.id);
            $('#nomeModalidadeEdit').val(result.nome);
            $('#inicioSubmissaoEdit').val(result.inicioSubmissao);
            $('#fimSubmissaoEdit').val(result.fimSubmissao);
            $('#inicioRevisaoEdit').val(result.inicioRevisao);
            $('#fimRevisaoEdit').val(result.fimRevisao);
            $('#inicioResultadoEdit').val(result.inicioResultado);


            if(result.caracteres == true){
                $('#id-limit-custom_field-accountEdit-1-1').prop('checked', true);
                $("#min-max-caracteresEdit").show();
                $("#min-max-palavrasEdit").hide();
            }
            if(result.palavras == true){
                $('#id-limit-custom_field-accountEdit-1-2').prop('checked', true);
                $("#min-max-caracteresEdit").hide();
                $("#min-max-palavrasEdit").show();
            }
            $('#maxcaracteresEdit').val(result.maxcaracteres);
            $('#mincaracteresEdit').val(result.mincaracteres);
            $('#maxpalavrasEdit').val(result.maxpalavras);
            $('#minpalavrasEdit').val(result.minpalavras);


            if(result.arquivo == true){

                $('#id-custom_field-accountEdit-1-2').prop('checked', true);
                $("#area-templateEdit").show();
                $("#tipo-arquivoEdit").show();
            }

            if(result.pdf == true){

                $('#pdfEdit').prop('checked', true);
            }
            if(result.jpg == true){

                $('#jpgEdit').prop('checked', true);
            }
            if(result.jpeg == true){

                $('#jpegEdit').prop('checked', true);
            }
            if(result.png == true){

                $('#pngEdit').prop('checked', true);
            }
            if(result.docx == true){

                $('#docxEdit').prop('checked', true);
            }
            if(result.odt == true){

                $('#odtEdit').prop('checked', true);
            }
          }});

          jQuery.ajax({
          url: "{{ route('encontrar.criterio') }}",
          method: 'get',
          data: {
             criterioId: $('#criterioIdAjax').val()
          },
          success: function(result){
            console.log(result);
            $('#nomeCriterioUpdate').val(result.nome);
            $('#pesoCriterioUpdate').val(result.peso);
            $('#modalidadeIdCriterioUpdate').val(result.id);
          }});
       });

    $('#areaIdformDistribuicaoPorArea').change(function () {
      $.ajaxSetup({
         headers: {
             // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             'Content-Type': 'application/json',
             'X-Requested-With': 'XMLHttpRequest'
         }
      });
      jQuery.ajax({
         url: "{{ route('numeroDeRevisoresAjax') }}",
         method: 'get',
         data: {
            // name: jQuery('#name').val(),
            // type: jQuery('#type').val(),
            // price: jQuery('#price').val()
            areaId: $('#areaIdformDistribuicaoPorArea').val()
         },
         success: function(result){
           if(result == 0){
             $('#numeroDeRevisoresPorTrabalhoButton').prop('disabled', true);
             alert("Não existem revisores nessa área.");
           }
           else{
             if($('#numeroDeRevisoresPorTrabalhoInput').val() < 1){
               $('#numeroDeRevisoresPorTrabalhoButton').prop('disabled', true);
             }
             else{
               $('#numeroDeRevisoresPorTrabalhoButton').prop('disabled', false);
             }
           }
           // $('#tituloTrabalhoAjax').html(result.titulo);
           // $('#resumoTrabalhoAjax').html(result.resumo);
           // $("h1, h2, p").toggleClass("blue");
         }});
    });
    $('#numeroDeRevisoresPorTrabalhoInput').on("input", function (){
      if($('#numeroDeRevisoresPorTrabalhoInput').val() < 1){
        $('#numeroDeRevisoresPorTrabalhoButton').prop('disabled', true);
      }
      else{
        $('#numeroDeRevisoresPorTrabalhoButton').prop('disabled', false);
      }
    });
  });

    function cadastrarCriterio() {
        var form = document.getElementById('formCadastrarCriterio');
        var modalidade = document.getElementById('modalidade');

        if (modalidade.value != "") {
            form.submit();
        } else {
            alert("Escolha uma modalidade");
        }
    }

    function myFunction(item, index) {
      // document.getElementById("demo").innerHTML += index + ":" + item + "<br>";
      console.log(index);
      console.log(item.id);
    }

    function addCheckbox(item) {
       var container = $('#cblist');
       var inputs = container.find('input');
       var id = inputs.length+1;

       var linha = "<div class="+"row"+">"+
                    "<div class="+"col-sm-12"+">"+
                    "<input type="+"checkbox"+" id="+"cb"+id+" name="+"revisores[]"+" value="+item.id+">"+
                    "<label for="+"cb"+id+" style="+"margin-left:10px"+">"+item.nomeOuEmail+"</label>"+
                    "</div>"+
                    "</div>";
       $('#cblist').append(linha);
    }
    function addOptionToSelect(item) {
       var container = $('#selectRevisorTrabalho');
       var inputs = container.find('option');
       var id = inputs.length+1;

       var linha = "<option value="+item.id+">"+item.nomeOuEmail+"</option>";
       $('#selectRevisorTrabalho').append(linha);
    }
    function addDisabledOptionToSelect() {
       var container = $('#selectRevisorTrabalho');
       var inputs = container.find('option');

       var linha = "<option value='' disabled selected hidden> Novo Revisor </option>";
       $('#selectRevisorTrabalho').append(linha);
    }

    function cadastrarCoodComissao(){

            document.getElementById("formCoordComissao").submit();
    }

    var newOptions = {
                      "Option 1": "value1",
                      "Option 2": "value2",
                      "Option 3": "value3"
                     };
    var $el = $("#testeId");
    // $("#areaRevisorTrabalhos").change(function(){
    //   alert("The text has been changed.");
    //   $el.empty(); // remove old options
    //   $.each(newOptions, function(key,value) {
    //     $el.append($("<option></option>")
    //     .attr("value", value).text(key));
    //   });
    // });
    $("#testeId").change(function(){
      alert("The text has been changed.");
    });

    
    // Marcar a visibilidade da atividade para participantes
    // Estudar como fazer
    function setVisibilidadeAtv(id) {
        var checkbox = document.getElementById('checkbox_' + id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        jQuery.ajax({
          url: "/coord/evento/atividades/"+ id +"/visibilidade",
          method: 'post',
        });
    }

    function salvarTipoAtividadeAjax() {
        $.ajax({
            url: "/coord/evento/tipo-de-atividade/new/" + $('#nomeTipo').val(),
            method: 'get',
            type: 'get',
            data: {
                _token: '{{csrf_token()}}',
                name: $('#nomeNovoTipo').val(),  
            },
            statusCode: {
                404: function() {
                    alert("O nome é obrigatório");
                }
            },
            success: function(data){
                // var data = JSON.parse(result);
                if (data != null) {
                    if (data.length > 0) {
                        if($('#tipo').val() == null || $('#tipo').val() == ""){
                            var option = '<option selected disabled>-- Tipo --</option>';
                        }
                        $.each(data, function(i, obj) {
                            if($('#tipo').val() != null && $('#tipo').val() == obj.id && i > 0){
                                option += '<option value="' + obj.id + '">' + obj.descricao + '</option>';
                            } else if (i == 0) {
                                option = '<option selected disabled>-- Tipo --</option>';
                            } else {
                                option += '<option value="' + obj.id + '">' + obj.descricao + '</option>';
                            }
                        })
                    } else {
                        var option = "<option selected disabled>-- Tipo --</option>";
                    }
                    $('#tipo').html(option).show();
                    if (data.length > 0) {
                        for(var i = 0; i < data.length; i++) {
                            // console.log('---------------------------------'+i+'------------------------');
                            // console.log(data[i].descricao);
                            // console.log(document.getElementById('nomeTipo').value);
                            // console.log(data[i].descricao === document.getElementById('nomeTipo').value);
                            if (data[i].descricao === document.getElementById('nomeTipo').value) {
                                document.getElementById('tipo').selectedIndex = i;
                            }
                        }
                    }
                    document.getElementById('nomeTipo').value = "";
                    $('#buttomFormNovoTipoAtividade').click();
                }
            }
        });
    }

    //Funções do form de atividades da programação
    function exibirDias(id) {
        if (id != 0) {
            document.getElementById('divDuracaoAtividade'+id).style.display = "block";
            var select = document.getElementById('duracaoAtividade'+id);
            switch (select.value) {
                case '1':
                    document.getElementById('dia1'+id).style.display = "block";
                    document.getElementById('dia2'+id).style.display = "none";
                    document.getElementById('dia3'+id).style.display = "none";
                    document.getElementById('dia4'+id).style.display = "none";
                    document.getElementById('dia5'+id).style.display = "none";
                    document.getElementById('dia6'+id).style.display = "none";
                    document.getElementById('dia7'+id).style.display = "none";
                    break;
                case '2':
                    document.getElementById('dia1'+id).style.display = "block";
                    document.getElementById('dia2'+id).style.display = "block";
                    document.getElementById('dia3'+id).style.display = "none";
                    document.getElementById('dia4'+id).style.display = "none";
                    document.getElementById('dia5'+id).style.display = "none";
                    document.getElementById('dia6'+id).style.display = "none";
                    document.getElementById('dia7'+id).style.display = "none";
                    break;
                case '3':
                    document.getElementById('dia1'+id).style.display = "block";
                    document.getElementById('dia2'+id).style.display = "block";
                    document.getElementById('dia3'+id).style.display = "block";
                    document.getElementById('dia4'+id).style.display = "none";
                    document.getElementById('dia5'+id).style.display = "none";
                    document.getElementById('dia6'+id).style.display = "none";
                    document.getElementById('dia7'+id).style.display = "none";
                    break;
                case '4':
                    document.getElementById('dia1'+id).style.display = "block";
                    document.getElementById('dia2'+id).style.display = "block";
                    document.getElementById('dia3'+id).style.display = "block";
                    document.getElementById('dia4'+id).style.display = "block";
                    document.getElementById('dia5'+id).style.display = "none";
                    document.getElementById('dia6'+id).style.display = "none";
                    document.getElementById('dia7'+id).style.display = "none";
                    break;
                case '5':
                    document.getElementById('dia1'+id).style.display = "block";
                    document.getElementById('dia2'+id).style.display = "block";
                    document.getElementById('dia3'+id).style.display = "block";
                    document.getElementById('dia4'+id).style.display = "block";
                    document.getElementById('dia5'+id).style.display = "block";
                    document.getElementById('dia6'+id).style.display = "none";
                    document.getElementById('dia7'+id).style.display = "none";
                    break;
                case '6':
                    document.getElementById('dia1'+id).style.display = "block";
                    document.getElementById('dia2'+id).style.display = "block";
                    document.getElementById('dia3'+id).style.display = "block";
                    document.getElementById('dia4'+id).style.display = "block";
                    document.getElementById('dia5'+id).style.display = "block";
                    document.getElementById('dia6'+id).style.display = "block";
                    document.getElementById('dia7'+id).style.display = "none";
                    break;
                case '7':
                    document.getElementById('dia1'+id).style.display = "block";
                    document.getElementById('dia2'+id).style.display = "block";
                    document.getElementById('dia3'+id).style.display = "block";
                    document.getElementById('dia4'+id).style.display = "block";
                    document.getElementById('dia5'+id).style.display = "block";
                    document.getElementById('dia6'+id).style.display = "block";
                    document.getElementById('dia7'+id).style.display = "block";
                    break;
            }
        } else {
            document.getElementById('divDuracaoAtividade').style.display = "block";
            var select = document.getElementById('duracaoAtividade');
            switch (select.value) {
                case '1':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "none";
                    document.getElementById('dia3').style.display = "none";
                    document.getElementById('dia4').style.display = "none";
                    document.getElementById('dia5').style.display = "none";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '2':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "none";
                    document.getElementById('dia4').style.display = "none";
                    document.getElementById('dia5').style.display = "none";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '3':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "none";
                    document.getElementById('dia5').style.display = "none";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '4':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "block";
                    document.getElementById('dia5').style.display = "none";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '5':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "block";
                    document.getElementById('dia5').style.display = "block";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '6':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "block";
                    document.getElementById('dia5').style.display = "block";
                    document.getElementById('dia6').style.display = "block";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '7':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "block";
                    document.getElementById('dia5').style.display = "block";
                    document.getElementById('dia6').style.display = "block";
                    document.getElementById('dia7').style.display = "block";
                    break;
            }
        }

    }

    // Variavel para definios os ids das divs dos cantidatos
    var contadorConvidados = 1;

    
    $(document).ready(function() {
        //Função que submete o form uma nova atividade
        $('#submitNovaAtividade').click(function(){
            var form = document.getElementById('formNovaAtividade');
            form.submit();
        });

        //Função para controlar a exibição da div para cadastro de um novo tipo de atividade
        $('#buttomFormNovoTipoAtividade').click(function(){
            if (document.getElementById('formNovoTipoAtividade').style.display == "block") {
                document.getElementById('formNovoTipoAtividade').style.display = "none";
            } else {
                document.getElementById('formNovoTipoAtividade').style.display = "block";
            }
        });

        //Função para controlar a exibição da div para cadastro de um novo tipo de função de convidado
        $('#buttonformNovaFuncaoDeConvidado').click(function() {
            if (document.getElementById('formNovaFuncaoDeConvidado').style.display == "block") {
                document.getElementById('formNovaFuncaoDeConvidado').style.display = "none";
            } else {
                document.getElementById('formNovaFuncaoDeConvidado').style.display = "block";
            }
        });

        
    });
    
    $(document).ready(function($){
        $(".apenasLetras").mask("#", {
            maxlength: false,
            translation: {
                '#': {pattern: /[A-zÀ-ÿ ]/, recursive: true}
            }
        });
    });

    //Função para adicionar o conteudo de um novo convidado
    function adicionarConvidado(id) {
        contadorConvidados++;
        if (id == 0) {
            $('#convidadosDeUmaAtividade').append(
                "<div id='novoConvidadoAtividade"+ contadorConvidados +"' class='row form-group'>" +
                    "<div class='container'>" +
                        "<h5>Convidado</h5>" +
                        "<div class='row'>" +
                            "<div class='col-sm-6'>" +
                                "<label for='nome'>Nome:</label>" +
                                "<input class='form-control apenasLetras' type='text' name='nomeDoConvidado[]' id='nome'  value='{{ old('nomeConvidado') }}' placeholder='Nome do convidado'>" +
                            "</div>" +
                            "<div class='col-sm-6'>" + 
                                "<label for='email'>E-mail:</label>" +
                                "<input class='form-control' type='email' name='emailDoConvidado[]' id='email' value='{{ old('emailConvidado') }}' placeholder='E-mail do convidado'>" +
                            "</div>" +
                        "</div>" +
                        "<div class='row'>" +
                            "<div class='col-sm-4'>" +
                                "<label for='funcao'>Função:</label>" +
                                "<select class='form-control' name='funçãoDoConvidado[]' id='funcao' onchange='outraFuncaoConvidado(0, this,"+ contadorConvidados +")'>" +
                                    "<option value='' selected disabled>-- Função --</option>" +
                                    "<option value='Palestrate'>Palestrate</option>" +
                                    "<option value='Avaliador'>Avaliador</option>" +
                                    "<option value='Ouvinte'>Ouvinte</option>" +
                                    "<option value='Outra'>Outra</option>" +
                                "</select>" +
                            "</div>" +
                            "<div id='divOutraFuncao"+contadorConvidados+"' class='col-sm-4' style='display: none;'>" +
                                "<label for='Outra'>Qual?</label>"+
                                "<input type='text' class='form-control apenasLetras' name='outra[]' id='outraFuncao'>"+
                            "</div>"+
                            "<div class='col-sm-4'>" + 
                                "<button type='button' onclick='removerConvidadoNovaAtividade("+ contadorConvidados +")' style='border:none; background-color: rgba(0,0,0,0);'><img src='{{ asset('/img/icons/user-times-solid.svg') }}' width='50px' height='auto'  alt='remover convidade' style='padding-top: 28px;'></button>" +
                            "</div>" +
                        "</div>" +
                    "</div>"+
                "</div>"
            )
        } else if (id > 0) {
            $('#convidadosDeUmaAtividade'+id).append(
                "<div id='novoConvidadoAtividade"+ contadorConvidados +"' class='row form-group'>" +
                    "<div class='container'>" +
                        "<h5>Convidado</h5>" +
                        "<div class='row'>" +
                            "<input type='hidden' name='idConvidado[]' value='0'>" +
                            "<div class='col-sm-6'>" +
                                "<label for='nome'>Nome:</label>" +
                                "<input class='form-control apenasLetras' type='text' name='nomeDoConvidado[]' id='nome'  value='{{ old('nomeConvidado') }}' placeholder='Nome do convidado'>" +
                            "</div>" +
                            "<div class='col-sm-6'>" + 
                                "<label for='email'>E-mail:</label>" +
                                "<input class='form-control' type='email' name='emailDoConvidado[]' id='email' value='{{ old('emailConvidado') }}' placeholder='E-mail do convidado'>" +
                            "</div>" +
                        "</div>" +
                        "<div class='row'>" +
                            "<div class='col-sm-4'>" +
                                "<label for='funcao'>Função:</label>" +
                                "<select class='form-control' name='funçãoDoConvidado[]' id='funcao' onchange='outraFuncaoConvidado("+contadorConvidados+", this,"+ contadorConvidados +")'>" +
                                    "<option value='' selected disabled>-- Função --</option>" +
                                    "<option value='Palestrate'>Palestrate</option>" +
                                    "<option value='Avaliador'>Avaliador</option>" +
                                    "<option value='Ouvinte'>Ouvinte</option>" +
                                    "<option value='Outra'>Outra</option>" +
                                "</select>" +
                            "</div>" +
                            "<div id='divOutraFuncao"+contadorConvidados+"' class='col-sm-4' style='display: none;'>" +
                                "<label for='Outra'>Qual?</label>"+
                                "<input type='text' class='form-control apenasLetras' name='outra[]' id='outraFuncao'>"+
                            "</div>"+
                            "<div class='col-sm-4'>" + 
                                "<button type='button' onclick='removerConvidadoNovaAtividade("+ contadorConvidados +")' style='border:none; background-color: rgba(0,0,0,0);'><img src='{{ asset('/img/icons/user-times-solid.svg') }}' width='50px' height='auto'  alt='remover convidade' style='padding-top: 28px;'></button>" +
                            "</div>" +
                        "</div>" +
                    "</div>"+
                "</div>"
            )
        }
    }

    //Função que remove o convidado
    function removerConvidadoNovaAtividade(id) {
        contadorConvidados--;
        $("#novoConvidadoAtividade"+id).remove();
    }
    
    //Função que subemete o form de edição de uma atividade
    function editarAtividade(id) {
        var form = document.getElementById('formEdidarAtividade' + id);
        form.submit();
    }

    //Função que abre a exibição dos botões dos dados opcionais e a div em para uma nova e a edição de uma atividade
    function abrirDadosAdicionais(id) {
        if (id == 0) {
            var divDadosAdicionais = document.getElementById("dadosAdicionaisNovaAtividade");
            var buttonAbrir = document.getElementById("buttonAbrirDadosAdicionais");
            var buttonFechar = document.getElementById("buttonFecharDadosAdicionais"); 
            divDadosAdicionais.style.display = "block";
            buttonAbrir.style.display = "none";
            buttonFechar.style.display = "block";
        } else if (id > 0) {
            var divDadosAdicionais = document.getElementById("dadosAdicionaisNovaAtividade"+id);
            var buttonAbrir = document.getElementById("buttonAbrirDadosAdicionais"+id);
            var buttonFechar = document.getElementById("buttonFecharDadosAdicionais"+id); 
            divDadosAdicionais.style.display = "block";
            buttonAbrir.style.display = "none";
            buttonFechar.style.display = "block";
        }
    }

    //Função que oculta a exibição dos botões dos dados opcionais e a em para uma nova e a edição de uma atividade
    function fecharDadosAdicionais(id) {
        if (id == 0) {
            var divDadosAdicionais = document.getElementById("dadosAdicionaisNovaAtividade");
            var buttonAbrir = document.getElementById("buttonAbrirDadosAdicionais");
            var buttonFechar = document.getElementById("buttonFecharDadosAdicionais"); 
            divDadosAdicionais.style.display = "none";
            buttonAbrir.style.display = "block";
            buttonFechar.style.display = "none";
        } else if (id > 0) {
            var divDadosAdicionais = document.getElementById("dadosAdicionaisNovaAtividade"+id);
            var buttonAbrir = document.getElementById("buttonAbrirDadosAdicionais"+id);
            var buttonFechar = document.getElementById("buttonFecharDadosAdicionais"+id); 
            divDadosAdicionais.style.display = "none";
            buttonAbrir.style.display = "block";
            buttonFechar.style.display = "none";
        }
    }

    //Remover convidado existente de editar atividade
    function removerConvidadoAtividade(id) {
        $("#convidadoAtividade"+id).remove();
    }

    //Função que exibe a caixa de outra função do convidado
    function outraFuncaoConvidado(id, funcaoSelect, contador) {
        if (id == 0 && contador == 0) {
            var div = document.getElementById('divOutraFuncao');
            if (funcaoSelect.value == "Outra") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        } else if (id == 0 && contador > 0) {
            var div = document.getElementById('divOutraFuncao'+contador);
            if (funcaoSelect.value == "Outra") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        } else if (id > 0 && contador == 0){
            var div = document.getElementById('divOutraFuncao'+id);
            if (funcaoSelect.value == "Outra") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        } else if (id > 0 && contador > 0) {
            var div = document.getElementById('divOutraFuncao'+id);
            if (funcaoSelect.value == "Outra") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
        // if (contador != 0) {
        //     var div = document.getElementById('divOutraFuncao'+contador);
        //     if (funcaoSelect.value == "Outra") {
        //         div.style.display = "block";
        //     } else {
        //         div.style.display = "none";
        //     }
        // } else {
        //     var div = document.getElementById('divOutraFuncao');
        //     if (funcaoSelect.value == "Outra") {
        //         div.style.display = "block";
        //     } else {
        //         div.style.display = "none";
        //     }
        // }
    }

    // Funções da aba de etiquetas
    $(document).ready(function(){
        $('#exibir_calendario').click(function() {
            if (this.checked) {
                document.getElementById('exibir_pdf').checked = false;
            } 
        });

        $('#exibir_pdf').click(function() {
            if (this.checked) {
                document.getElementById('exibir_calendario').checked = false;
            } 
        });
    });

    function revisoresPorArea() {
        var idArea = document.getElementById('area_revisores').value;
        $.ajaxSetup({
            headers: {
                // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        jQuery.ajax({
            url: "/revisores-por-area/" + idArea,
            method: 'get',
            success: function(result){
                if (result != null) {
                    $('#revisores_cadastrados').html("");
                    var table = "<thead>" +
                          "<tr>" +
                            "<th scope='col'>Nome</th>" +
                            "<th scope='col'>Área</th>" +
                            "<th scope='col' style='text-align:center'>Em Andamento</th>" +
                            "<th scope='col' style='text-align:center'>Finalizados</th>" +
                            "<th scope='col' style='text-align:center'>Visualizar</th>" +
                            "<th scope='col' style='text-align:center'>Lembrar</th>" +
                          "</tr>" +
                        "</thead>" +
                        "<tbody>";
                    $.each(result, function(i, obj) {
                        table += "<tr>" +
                                "<td>"+ obj.email +"</td>"+
                                "<td>"+ obj.area +"</td>" +
                                "<td style='text-align:center'>"+ obj.emAndamento +"</td>" +
                                "<td style='text-align:center'>"+ obj.concluido +"</td>" +
                                "<td style='text-align:center'>" +
                                  "<a href='#' data-toggle='modal' data-target='#modalRevisor'"+obj.id+">" +
                                    "<img src='{{asset('img/icons/eye-regular.svg')}}' style='width:20px'>" +
                                  "</a>" +
                                "</td>" +
                                "<td style='text-align:center'>" +
                                    "<form action='{{route('revisor.convite.evento', ['id' => $evento->id])}}' method='get' >" +
                                        "<input type='hidden' name='id' value='"+obj.id+"'>" +
                                        "<button class='btn btn-primary btn-sm' type='submit'>" +
                                            "Enviar convite" +
                                        "</button>" +
                                    "</form>" +
                                "</td>" +
                              "</tr>";
                    })
                    table += "</tbody>"
                    $('#revisores_cadastrados').html(table);
                }
            }
        });
    }

    function pesquisaResultadoTrabalho() {
        var idArea = document.getElementById('area_trabalho_pesquisa').value;
        var pesquisaTexto = document.getElementById('pesquisaTexto').value;
        $.ajaxSetup({
            headers: {
                // 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        jQuery.ajax({
            url: "{{ route('trabalho.pesquisa.ajax') }}",
            method: 'get',
            data: {
                areaId: idArea,
                texto: pesquisaTexto,
            },
            success: function(result){
                console.log(result);
                if (result != null) {
                    $('#cards_com_trabalhos').html("");
                    var cards = "";
                    $.each(result, function(i, obj) {
                        if (obj.rota_download != '#') {
                            cards +=    "<div class='card bg-light mb-3' style='width: 20rem;'>"+
                                        "<div class='card-body'>" +
                                            "<h5 class='card-title'>" + obj.titulo +"</h5>" +
                                            "<h6 class='card-subtitle mb-2 text-muted'>" + obj.nome + "</h6>" +
                                            "<label for='area'>Área:</label>" +
                                            "<p id='area'>" + obj.area +"</p>" +
                                            "<label for='modalidade'>Modalidade:</label>" +
                                            "<p id='modalidade'>"+ obj.modalidade +"</p>" +
                                            "<a href='#' class='card-link' data-toggle='modal' data-target='#modalResultados"+ obj.id +"'>Resultado</a>" +
                                            "<a href='"+obj.rota_download+"' class='card-link'>Baixar</a>" +    
                                        "</div>" +
                                    "</div>";
                        } else {
                            cards +=    "<div class='card bg-light mb-3' style='width: 20rem;'>"+
                                        "<div class='card-body'>" +
                                            "<h5 class='card-title'>" + obj.titulo +"</h5>" +
                                            "<h6 class='card-subtitle mb-2 text-muted'>" + obj.nome + "</h6>" +
                                            "<label for='area'>Área:</label>" +
                                            "<p id='area'>" + obj.area +"</p>" +
                                            "<label for='modalidade'>Modalidade:</label>" +
                                            "<p id='modalidade'>"+ obj.modalidade +"</p>" +
                                            "<a href='#' class='card-link' data-toggle='modal' data-target='#modalResultados"+ obj.id +"'>Resultado</a>" +
                                        "</div>" +
                                    "</div>";
                        }
                        
                    })
                    $('#cards_com_trabalhos').html(cards);
                }
            }
        })
    }

    // Funções de inscrições
    function ativarLink(elemento) {
        elemento.children[0].click();

        if (elemento == document.getElementById("li_promocoes")) {
            elemento.className = "aba ativado";
            document.getElementById("li_cuponsDeDesconto").className = "aba aba-tab";
            document.getElementById("li_categoria_participante").className = "aba aba-tab";
            document.getElementById('li_formulari_inscricao').className = "aba aba-tab";
        } else if (elemento == document.getElementById("li_cuponsDeDesconto")) {
            elemento.className = "aba ativado";
            document.getElementById("li_promocoes").className = "aba aba-tab";
            document.getElementById("li_categoria_participante").className = "aba aba-tab";
            document.getElementById('li_formulari_inscricao').className = "aba aba-tab";
        } else if (elemento == document.getElementById("li_categoria_participante")) {
            elemento.className = "aba ativado";
            document.getElementById("li_promocoes").className = "aba aba-tab";
            document.getElementById("li_cuponsDeDesconto").className = "aba aba-tab";
            document.getElementById('li_formulari_inscricao').className = "aba aba-tab";
        } else if (elemento == document.getElementById('li_formulari_inscricao')) {
            elemento.className = "aba ativado";
            document.getElementById("li_promocoes").className = "aba aba-tab";
            document.getElementById("li_cuponsDeDesconto").className = "aba aba-tab";
            document.getElementById("li_categoria_participante").className = "aba aba-tab";
        }
    }

    function adicionarLoteAhPromocao() {
        $('#lotes').append(
            "<div class='row'>" +
                "<div class='col-sm-4'>" +
                    "<label for='dataDeInicio'>Data de início</label>" +
                    "<input id='dataDeInicio' name='dataDeInício[]' class='form-control' type='date'>" +
                "</div>" +
                "<div class='col-sm-4'>" +
                    "<label for='dataDeFim'>Data de fim</label>" +
                    "<input id='dataDeFim' name='dataDeFim[]' class='form-control' type='date'>" +
                "</div>" +
                "<div class='col-sm-3'>" + 
                    "<label for='quantidade'>Disponibilidade</label>" +
                    "<input id='quantidade' name='disponibilidade[]' class='form-control' type='number' placeholder='10'>" +
                "</div>" +
                "<div class='col-sm-1'>" +
                    "<a href='#' title='Remover lote' onclick='removerLoteDaPromocao(this)'><img src='{{asset('img/icons/lixo.png')}}' width='35px' style='position: relative; top: 32px;'></a>" +
                "</div>" +
            "</div>"
        );
    }

    function removerLoteDaPromocao(elemento) {
        elemento.parentElement.parentElement.remove();
    }

    function alterarPlaceHolderDoNumero(elemento) {
        var input = document.getElementById('valorCupom')
        if (elemento.value == "real") {
            input.placeholder = "R$ 10,00"
        } else if (elemento.value == "porcentagem") {
            input.placeholder = "10%"
        }
    }

    function deixarMaiusculo(e) {
        var inicioCursor = e.target.selectionStart;
        var fimCursor = e.target.selectionEnd;
        e.target.value = e.target.value.toUpperCase();
        e.target.selectionStart = inicioCursor;
        e.target.selectionEnd = fimCursor;
    }

    var quantidadeDePeriodos = 0;
    function adicionarPeriodoCategoria() {
        var html = "";
        
        if (quantidadeDePeriodos == 0) {
            html += "<div id='tituloDePeriodo' class='row form-group'>" +
                        "<div class='col-sm-12'>" +
                            "<hr>" +
                            "<h4>Periodos de desconto</h4>" +
                        "</div>" +
                    "</div>";
        }
        html += "<div class='peridodoDesconto'>" +
                    "<div class='row form-group'>" +
                        "<div class='col-sm-4'>" +
                            "<label for='tipo_valor'>Valor do desconto*</label>" +
                            "<br>" +
                            "<select class='form-control' name='tipo_valor[]' required>" +
                                "<option value='' disabled selected>-- Escolha o tipo de valor --</option>" +
                                "<option value='porcentagem'>Porcentagem</option>" +
                                "<option value='real'>Real</option>" +
                            "</select>" +
                        "</div>" +
                        "<div class='col-sm-6'>" +
                            "<label for='valorDesconto'>Valor</label>" +
                            "<input id='valorDesconto' name='valorDesconto[]' type='number' class='form-control real @error('number') is-invalid @enderror' placeholder='' value='' required>" +
                        "</div>" +
                    "</div>" +
                    "<div class='row form-group'>" +
                        "<div class='col-sm-5'> " +
                            "<label for='inicio'>Data de início*</label>" + 
                            "<input id='inicio' name='inícioDesconto[]' class='form-control' type='date' value='' required>" +
                        "</div>" +
                        "<div class='col-sm-5'>" +
                            "<label for='fim'>Data de fim*</label>" +
                            "<input id='fim' name='fimDesconto[]' class='form-control' type='date' value='' required>" +
                        "</div>" +
                        "<div class='col-sm-2' style='position: relative; top: 35px;'>" +
                            "<a type='button' onclick='removerPeriodoDesconto(this)'><img src='{{asset('img/icons/trash-alt-regular.svg')}}' class='icon-card' alt=''></a>" +
                        "</div>" +
                    "</div>"+ 
                "</div>";
        quantidadeDePeriodos++;
        $('#periodosCategoria').append(html);
    }

    function removerPeriodoDesconto(button) {
        quantidadeDePeriodos--;
        button.parentElement.parentElement.parentElement.remove();
        if (quantidadeDePeriodos == 0) {
            document.getElementById('tituloDePeriodo').remove();
        }
    }

  </script>
  @if (old('criarCategoria') != null)
    <script>
        $(document).ready(function() {
            $("#modalCriarCategoria").modal('show');
        })
    </script>
  @endif
  @if (old('criarCupom') != null)
    <script>        
        $(document).ready(function() {
            $("#modalCriarCupom").modal('show');
        })
    </script>
  @endif
  @if (old('novaPromocao') != null) 
    <script>
        $(document).ready(function() {
            $("#modalCriarPromocao").modal('show');
        })
    </script>
  @endif
  @if(old('editarAreaId') != null) 
    <script>
        $(document).ready(function() {
            $("#modalEditarArea{{old('editarAreaId')}}").modal('show');
        })
    </script>
  @endif
  @if(old('modalidadeEditId') != null) 
    <script>
        $(document).ready(function() {
            $("#modalEditarModalidade{{old('modalidadeEditId')}}").modal('show');
        });
    </script>
  @endif
  @if(old('idAtividade') != null)
    <script>
        $(document).ready(function() {
            $('#modalAtividadeEdit{{old('idAtividade')}}').modal('show');
        });
    </script>
  @endif
  @if (old('distribuirTrabalhosAutomaticamente') != null) 
    <script>
        $(document).ready(function() {
            $('#modalDistribuicaoAutomatica').modal('show');
        });
    </script>
  @endif
  @if(old('idNovaAtividade') == 2)
    <script>
        $(document).ready(function() {
            $('#modalCriarAtividade').modal('show');
        });
        $(document).ready(function() {
            document.getElementById('divDuracaoAtividade').style.display = "block";
            switch ($('#duracaoAtividade').val()) {
                case '1':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "none";
                    document.getElementById('dia3').style.display = "none";
                    document.getElementById('dia4').style.display = "none";
                    document.getElementById('dia5').style.display = "none";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '2':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "none";
                    document.getElementById('dia4').style.display = "none";
                    document.getElementById('dia5').style.display = "none";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '3':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "none";
                    document.getElementById('dia5').style.display = "none";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '4':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "block";
                    document.getElementById('dia5').style.display = "none";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '5':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "block";
                    document.getElementById('dia5').style.display = "block";
                    document.getElementById('dia6').style.display = "none";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '6':
                    document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "block";
                    document.getElementById('dia5').style.display = "block";
                    document.getElementById('dia6').style.display = "block";
                    document.getElementById('dia7').style.display = "none";
                    break;
                case '7':
                document.getElementById('dia1').style.display = "block";
                    document.getElementById('dia2').style.display = "block";
                    document.getElementById('dia3').style.display = "block";
                    document.getElementById('dia4').style.display = "block";
                    document.getElementById('dia5').style.display = "block";
                    document.getElementById('dia6').style.display = "block";
                    document.getElementById('dia7').style.display = "block";
                    break;
            }
        });
    </script>
  @endif
@endsection
