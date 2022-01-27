<!-- PAGE CONTENT BEGINS -->
<style>
.db {
    color: #069;
}

.lb {
    color: #4f9fcf;
}

.g {
    color: #0A8
}

.r {
    color: #c7254e
}

.o {
    color: #f2a91c;
}

code.highlight {
    padding:2px 4px;
    font-size:90%;
    color:#c7254e;
    background-color:#f9f2f4;
    border-radius:4px
}
</style>
<div class="col-sm12">
    <p>One of the most used settings in the pixi* Apps are the payment selections. Developers tend to develope various solutions. Some are creating input fields where customers can provide
    the payment short or the payment name. Others however create selections for this matter.</p>
    <p>To unify and simplify this functionallity for you we've created a class that is specifically for this matter. You won't need to write your own helpers, libraries, models or whatever comes
    into a developers mind. Everything you'll have to do is inizialize the payments dropdown and you're good to go.<br />
    These examples will show you how to use the payments dropdown library.</p>
</div>
<hr />
<div class="col-sm6">
    <p>This is example will create the default payments selection field with the payment codes as values and the payment text as option description.</p>
    <div class="highlight">
        <pre><code>&lt;?php            

<span class="lb">$paymentsDropdown</span> = <span class="db">new</span> <span class="g">PaymentsDropdown</span>(<span class="db">null</span>, <span class="db">null</span>, <span class="r">'payments'</span>, <span class="r">'paypal'</span>);

?&gt;</code></pre>
    </div>
</div>
<div class="col-sm6">
        <?= $defaultDropdown; ?>
</div>
<hr />
<div class="col-sm6">
    <p>Rarely used, but also possible is this combination. You can set which field of the API call pixiGetPaymenttypes represents the value and option description of your payments dropdpwn.</p>
    <div class="highlight">
        <pre><code>&lt;?php            

<span class="lb">$paymentsDropdown</span> = <span class="db">new</span> <span class="g">PaymentsDropdown</span>(<span class="r">'PaymentText'</span>, <span class="r">'Code'</span>, <span class="r">'payments'</span>, <span class="r">'paypal'</span>);

?&gt;</code></pre>
    </div>
</div>
<div class="col-sm6">
        <?= $adjustedDropdown; ?>
</div>
<hr />
<div class="col-sm12">
    <h3>Scan the sources</h3>
    <p>As always feel free to check out our project on Bitbucket for a more detailed description and the source code.<br />
    <a href="https://bitbucket.org/pixi_software/pixi-sdk-ui/wiki/Home" target="_blank">(Check it our for more details <i class="ace-icon fa fa-external-link"></i>)</a></p>
</div>
