<div class="col-xs-12 col-sm-6 banner_col">
    <div class="row">
        {if isset($banner['banner'][0])}{include file="./stbanner-block.tpl" banner_data=$banner['banner'][0] classname="col-xxs-12 col-xs-6 col-sm-6"}{/if}
        {if isset($banner['banner'][1])}{include file="./stbanner-block.tpl" banner_data=$banner['banner'][1] classname="col-xxs-12 col-xs-6 col-sm-6"}{/if}
    </div>
</div>
<div class="col-xs-12 col-sm-6 banner_col">
    <div class="row">
        {if isset($banner['banner'][2])}{include file="./stbanner-block.tpl" banner_data=$banner['banner'][2] classname="col-xxs-12 col-xs-6 col-sm-6"}{/if}
        {if isset($banner['banner'][3])}{include file="./stbanner-block.tpl" banner_data=$banner['banner'][3] classname="col-xxs-12 col-xs-6 col-sm-6"}{/if}
    </div>
</div>