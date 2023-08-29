var idZonaSelecionada;
        var ZonaSelecionada;
        var idEquipeSelecionada;
        var EquipeSelecionada;
        var contadorZona = 0;
        var contadorEquipe = 0;
        var zonasAdicionadas = [];
        var equipesAdicionadas = [];

        function isZoneAlreadyAdded(zoneId) {
            var hiddenInputValues = $('input[type="hidden"][name^="zona_"]').map(function() {
                return this.value;
            }).get();
            return hiddenInputValues.includes(zoneId);
        }

        function isTeamAlreadyAdded(teamId) {
            var hiddenInputValues = $('input[type="hidden"][name^="equipe_"]').map(function() {
                return this.value;
            }).get();
            return hiddenInputValues.includes(teamId);
        }

        $(document).ready(function() {
            $('.addZona').on('change', function() {
                // Pegar o id da Zona selecionada
                idZonaSelecionada = $(this).val();

                // Pegar a Zona dentro do elemento <option> Selecionada
                ZonaSelecionada = $(this).find('option:selected').text();

                // Fazer o que desejar com os idZonaes obtidos
                console.log('idZona Selecionada:', idZonaSelecionada);
                console.log('Zona Selecionada:', ZonaSelecionada);
            });

            $('.addEquipe').on('change', function() {
                // Pegar o id da Equipe selecionada
                idEquipeSelecionada = $(this).val();

                // Pegar a Equipe dentro do elemento <option> Selecionada
                EquipeSelecionada = $(this).find('option:selected').text();

                // Fazer o que desejar com os idEquipees obtidos
                console.log('idEquipe Selecionada:', idEquipeSelecionada);
                console.log('Equipe Selecionada:', EquipeSelecionada);
            });

            $("#addButtonZona").click(function() {
                if (ZonaSelecionada !== undefined && !isZoneAlreadyAdded(idZonaSelecionada)) {
                    zonasAdicionadas.push(idZonaSelecionada);
                    $("#txtZona").append('<div class="zone-wrapper" data-id="' + contadorZona + '"><input type="hidden" name="zona_' + contadorZona + '" value="' + idZonaSelecionada + '"> <span>' + ZonaSelecionada + '</span> <a href="#" class="delete-zone" data-action="delete"><i class="fas fa-trash" style="color: #338a5f;"></i></a></div>');
                    contadorZona++;
                } else {
                    alert('Essa zona já foi adicionada.');
                }
            });

            $("#addButtonEquipe").click(function() {
                if (EquipeSelecionada !== undefined && !isTeamAlreadyAdded(idEquipeSelecionada)) {
                    equipesAdicionadas.push(idEquipeSelecionada);
                    $("#txtEquipe").append('<div class="team-wrapper" data-id="' + contadorEquipe + '"><input type="hidden" name="equipe_' + contadorEquipe + '" value="' + idEquipeSelecionada + '"> <a>' + EquipeSelecionada + '</a> <a href="#" class="delete-team" data-action="delete"><i class="fas fa-trash" style="color: #338a5f;"></i></a></div>');
                    contadorEquipe++;
                } else {
                    alert('Essa equipe já foi adicionada.');
                }
            });

            // Evento de clique para o ícone do lixo da equipe
            $(document).on('click', '.delete-team', function(event) {
                event.preventDefault();
                var id = $(this).closest('.team-wrapper').data('id');
                // Remover o elemento da equipe da exibição
                $(this).closest('.team-wrapper').remove();
                // Remover também o input hidden associado à equipe
                $('input[name="equipe_' + id + '"]').remove();
                // Também é possível fazer algo com o ID para efetuar a remoção dos dados no backend, se necessário
                console.log('Excluir equipe com ID:', id);
            });

            // Evento de clique para o ícone do lixo da zona
            $(document).on('click', '.delete-zone', function(event) {
                event.preventDefault();
                var id = $(this).closest('.zone-wrapper').data('id');
                // Remover o elemento da zona da exibição
                $(this).closest('.zone-wrapper').remove();
                // Remover também o input hidden associado à zona
                $('input[name="zona_' + id + '"]').remove();
                // Também é possível fazer algo com o ID para efetuar a remoção dos dados no backend, se necessário
                console.log('Excluir zona com ID:', id);
                // Adicionar o ID da zona novamente ao array para permitir adicionar novamente a mesma zona
                zonasAdicionadas = zonasAdicionadas.filter(function(item) {
                    return item !== idZonaSelecionada;
                });
            });
        });