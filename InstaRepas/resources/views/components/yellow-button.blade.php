<a {{ $attributes->merge(['class' => '...']) }} style="
    text-decoration: none;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 4px 24px;
    width: auto;
    height: 40px;
    background: #FFDB58;
    border: 3px solid #253E5C; /* Couleur de la bordure et épaisseur */
    box-shadow: 4px 4px 0px #253E5C;
    border-radius: 5px;
    font-size : 16px;
    font-weight: bold;
">
    {{ $slot }}
</a>
