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
    <p>The generation of Bootstrap tables is now easier then ever. With the supplied <code class="highlight">UI-Library</code> a table is done in just a few lines of code, including the table content.<br />
    See how its done:</p>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="highlight">
            <pre>
                <code>
&lt;?php

<span class="o">// Including library classes</span>
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Table</span>\<span class="g">Table</span>;
<span class="db">use</span> <span class="g">Pixi</span>\<span class="g">Ui</span>\<span class="g">Data</span>\<span class="g">DataFormat</span>;

<span class="db">class</span> <span class="g">Uilibrary</span> <span class="db">extends</span> <span class="g">SDKMenu</span>
{
    <span class="db">public function</span> <span class="g">__construct</span>()
    {
        <span class="g">parent</span>::<span class="lb">__construct</span>();
    }
    
    <span class="db">public function</span> <span class="g">tables</span>()
    {                
        <span class="o">// Get table content</span>
        <span class="lb">$result</span> = <span class="lb">$this</span>-><span class="lb">pixiapi</span>-><span class="lb">pixiGetCountries</span>();

        <span class="o">/**
         * Create table object and define its structure.
         * 
         * The class is written in a way that it can automatically take
         * the results of an API call and assign it to the correct columns.
         * For this matter it's neccessary that the column names are the same as the
         * keys received in the API call results.
         */</span>
        <span class="lb">$countryTable</span> = <span class="db">new</span> <span class="g">Table</span>(<span class="r">'List of all Countries'</span>, <span class="g">Table</span>::<span class="lb">TableTypeDataTables</span>);
        <span class="lb">$countryTable</span>-><span class="lb">addColumn</span>(<span class="r">'CntCode'</span>, <span class="r">'ISO Code'</span>, <span class="g">DataFormat</span>::<span class="lb">FORMAT_STRING</span>);
        <span class="lb">$countryTable</span>-><span class="lb">addColumn</span>(<span class="r">'CntName'</span>, <span class="r">'Country Name'</span>, <span class="g">DataFormat</span>::<span class="lb">FORMAT_STRING</span>);
        <span class="lb">$countryTable</span>-><span class="lb">addColumn</span>(<span class="r">'DefShipCosts'</span>, <span class="r">'Std Shipping Costs'</span>, <span class="g">DataFormat</span>::<span class="lb">FORMAT_MONEY</span>);
        
        <span class="o">// After the table structure was defined, we assign the content to the table</span>
        <span class="lb">$countryTable</span>-><span class="lb">addRows</span>(<span class="lb">$result</span>-><span class="lb">getResultset</span>());

        <span class="lb">$this</span>-><span class="lb">loadMainView</span>(<span class="r">'UI Library'</span>, <span class="r">'Rapid development with less code'</span>, <span class="lb">$countryTable</span>);
    }
}
                </code>
            </pre>
        </div>
    </div>
</div>
<hr />
<div class="col-sm12">
    <h3>Scan the sources</h3>
    <p>Below you see the code in action! Feel free to check out our project on Bitbucket for a more detailed description and the source code.<br />
    <a href="https://bitbucket.org/pixi_software/pixi-sdk-ui/wiki/Home" target="_blank">(Check it our for more details <i class="ace-icon fa fa-external-link"></i>)</a></p>
</div>
<hr />
