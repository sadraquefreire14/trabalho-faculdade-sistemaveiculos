document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formVeiculo');
    const mensagem = document.getElementById('mensagem');
    const btnText = document.querySelector('.btn-text');
    const btnLoader = document.querySelector('.btn-loader');

    // Define a data atual como padrão
    const dataAtual = new Date().toISOString().split('T')[0];
    document.getElementById('data_cadastro').value = dataAtual;

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Coleta os dados do formulário
        const formData = new FormData(form);
        const dados = {};

        formData.forEach((value, key) => {
            dados[key] = value.trim();
        });

        // Validação adicional no cliente
        const camposObrigatorios = [
            'placa', 'marca', 'modelo', 'ano_fabricacao', 'ano_modelo',
            'cor', 'combustivel', 'quilometragem', 'chassi', 'renavam',
            'data_cadastro', 'observacoes'
        ];

        for (let campo of camposObrigatorios) {
            if (!dados[campo]) {
                mostrarMensagem('Erro: O campo ' + campo + ' é obrigatório.', 'erro');
                return;
            }
        }

        // Mostra loading
        btnText.style.display = 'none';
        btnLoader.style.display = 'inline';

        // Envia para o PHP
        fetch('php/cadastrar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na comunicação com o servidor');
            }
            return response.json();
        })
        .then(resultado => {
            btnText.style.display = 'inline';
            btnLoader.style.display = 'none';

            if (resultado.sucesso) {
                mostrarMensagem(resultado.mensagem, 'sucesso');
                form.reset();
                document.getElementById('data_cadastro').value = dataAtual;
            } else {
                mostrarMensagem(resultado.mensagem || 'Erro ao cadastrar veículo.', 'erro');
            }
        })
        .catch(error => {
            btnText.style.display = 'inline';
            btnLoader.style.display = 'none';
            mostrarMensagem('Erro de conexão: ' + error.message, 'erro');
            console.error('Erro:', error);
        });
    });

    function mostrarMensagem(texto, tipo) {
        mensagem.textContent = texto;
        mensagem.className = 'mensagem ' + tipo;

        // Auto-esconde após 5 segundos se for sucesso
        if (tipo === 'sucesso') {
            setTimeout(() => {
                mensagem.style.display = 'none';
            }, 5000);
        }
    }
});