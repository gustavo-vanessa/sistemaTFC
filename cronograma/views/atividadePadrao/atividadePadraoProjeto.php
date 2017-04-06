    <div class="div_form" id="scroll">

        <label class="titulo">Atividades e Subatividades Padrões</label>
       <form name="formT">
       <table width="10%" border="0" cellpadding="4" cellspacing="0" class="xTB">
         <tr>
         <td width="10%">
             <table width="10%" align="center" cellpadding="5" cellspacing="0">
          <td rowspan="2" style="WIDTH:150px; HEIGHT:30px;">
                <select name="num_disp" size=4 class="xT" multiple> 
                        <?php 
                        foreach ($atividades as $atividade){
                            echo " <option value='".$atividade['id_atividades_padroes']."'>".$atividade['nome_atividades_padroes']."</option>";
                            
                        }?>
                </select>
          </td>
          <td><input name="vem" type="button" class="btns" onClick="adicionaItem(formT.nums,formT.num_disp);" value="<="></td>
          <td><input name="vai" type="button" class="btns" onClick="adicionaItem(formT.num_disp,formT.nums);" value="=>"></td>
                <td rowspan="2" style="WIDTH: 150px; HEIGHT: 30px;">
                <select name="nums" size=4 class="xT" multiple> 

                </select>
                </td>
             </table>
             </td>
           </tr>
        </table>
       </form>
        
        <br />

    <table>
        <tr>
            <td><input type="submit" name="submit" value="Salvar" class="btn btn-padrao btn-shadow btn-rc"/></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>atividade/form_add">Adicionar Atividade</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL; ?>subatividade/form_add">Adicionar Sub Atividade</a></td>
            <td><a class="btn btn-padrao btn-shadow btn-rc" href="<?php echo BASE_URL . 'atividade/atividadesProjeto/'.$_SESSION['id_projeto']?>">Voltar</a></td>
        </tr></table>
    <br />
    </div>

    
    
    <script language="javascript">
    function adicionaItem(campoOrig,campoDest) 
    {
        x = campoOrig.value;

        if (x === "")
        {
            alert('Selecione um item!');
        }

        ListaDisponiveis = campoOrig; 
        ListaAcordo = campoDest;

        var len = ListaAcordo.length;

        for(var i = 0; i < ListaDisponiveis.length; i++) 
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
    </script>