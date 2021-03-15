<?php



// Verificar se existe a session mensagem

if (isset($_SESSION['mensagem'])) :
?>
    <script>
        window.onload = function() {
            M.toast({
                html: '<?php echo $_SESSION['mensagem']; ?>'
            })
        };
    </script>

<?php
endif;
session_unset();
?>