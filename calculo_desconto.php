<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Desconto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cálculo de Desconto</h2>
        <form method="post">
            <label for="valor">Valor Total da Compra:</label>
            <input type="number" step="0.01" name="valor" id="valor" required>

            <label for="pagamento">Opção de Pagamento:</label>
            <select name="pagamento" id="pagamento" required>
                <option value="dinheiro">Dinheiro</option>
                <option value="debito">Cartão de Débito</option>
                <option value="credito">Cartão de Crédito</option>
            </select>

            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valor = $_POST['valor'];
            $pagamento = $_POST['pagamento'];
            $desconto = 0;

            if ($pagamento == 'dinheiro') {
                $desconto = 0.10;
            } elseif ($pagamento == 'debito') {
                $desconto = 0.05;
            } elseif ($pagamento == 'credito') {
                $desconto = 0.00;
            }

            $valorDesconto = $valor * $desconto;
            $totalPagar = $valor - $valorDesconto;

            echo "<h3>Resumo da Compra</h3>";
            echo "<p>Valor Total: R$ " . number_format($valor, 2, ',', '.') . "</p>";
            echo "<p>Opção de Pagamento: " . ucfirst($pagamento) . "</p>";
            echo "<p>Desconto Aplicado: R$ " . number_format($valorDesconto, 2, ',', '.') . " (" . ($desconto * 100) . "%)</p>";
            echo "<p>Total a Pagar: R$ " . number_format($totalPagar, 2, ',', '.') . "</p>";
        }
        ?>
    </div>
</body>
</html>
