<div class="div_form" id="scroll">
    <label class="titulo">Atividades e Subatividades Padrões</label>
    <form name="formT">

        <td width="10%">
            <table width="10%" align="center" cellpadding="5" cellspacing="0">
                <thead>
                <td>Atividades Disponiveis</td>
                <td></td>
                <td></td>
                <td>Atividades Selecionadas</td>
                </thead>
                <tbody>
                <td rowspan="2" style="WIDTH:150px; HEIGHT:30px;">
                    <select name="ati_disp" id="ati_disp" size=4 class="xT" multiple > 
                        <?php
                        foreach ($atividades as $atividade) {
                            echo " <option value='" . $atividade['nome_atividades_padroes'] . "'>" . $atividade['nome_atividades_padroes'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input name="vem" type="button" class="btns" onClick="adicionaItem(formT.ati_sel, formT.ati_disp);" value="<="></td>
                <td><input name="vai" type="button" class="btns" onClick="adicionaItem(formT.ati_disp, formT.ati_sel);" value="=>"></td>
                <td rowspan="2" style="WIDTH: 150px; HEIGHT: 30px">

                    <select name="ati_sel" id="ati_sel" size=4 class="xT" multiple> 

                    </select>
                </td>
                </tbody>
            </table>
        </td>
        <br />
        <table>
            <tr>
                <td><input type='button' id='importar' value='Importar!' class="btn btn-padrao btn-shadow btn-rc"/></td>
                <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'atividade/atividadesProjeto/' . $_SESSION['id_projeto'] ?>">Voltar</a></td>
            </tr>
        </table>
        <br />
    </form>
</div>



<script language="javascript">
    function adicionaItem(campoOrig, campoDest)
    {
        x = campoOrig.value;

        if (x === "")
        {
            alert('Selecione um item!');
        }

        ListaDisponiveis = campoOrig;
        ListaAcordo = campoDest;

        var len = ListaAcordo.length;

        for (var i = 0; i < ListaDisponiveis.length; i++)
        {
            if ((ListaDisponiveis.options[i] !== null) &&
                    (ListaDisponiveis.options[i].selected))
            {

                ListaAcordo.options[len] = new Option(ListaDisponiveis.options[i].text, ListaDisponiveis.options[i].value);
                len++;
                ListaDisponiveis.options[i] = null;
                i--;
            }
        }
    }
    
 function sendPost (url, obj){
                //Define o formulário
                var myForm = document.createElement("form");
                myForm.action = url;
                myForm.method = "post";
 
	        for(var key in obj) {
		     var input = document.createElement("input");
		     input.type = "text";
		     input.value = obj[key];
		     input.name = key;
		     myForm.appendChild(input);			
	        }
                //Adiciona o form ao corpo do documento
                document.body.appendChild(myForm);
                //Envia o formulário
                myForm.submit();
            }    
        
    document.getElementById("importar").onclick = function () {
        var comboCidades = document.getElementById("ati_sel");
        var ati=[];
        for (i = 0; i < comboCidades.length; i = i + 1) {
            comboCidades.selectedIndex = i;
            //console.log("O indice é: " + comboCidades.selectedIndex);
            console.log("O texto é: " + comboCidades.options[comboCidades.selectedIndex].text);
            ati.push(comboCidades.options[comboCidades.selectedIndex].value);
        }
        sendPost("<?php echo BASE_URL; ?>atividadePadrao/addPadrao", ati);
    };

</script>