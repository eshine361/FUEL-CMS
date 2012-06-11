<h1>Generate</h1>
<p>FUEL CMS provides a command line tool to help you auto generate starter files for your simple and advanced modules. To do so, navigate 
to the folder (e.g. using "cd") where the main bootstrap index.php file exists. Then you can type the commands below which uses the
<a href="http://codeigniter.com/user_guide/general/cli.html" target="_blank">CodeIgniter CLI</a> to generate files automatically.</p>

<h2>Configuration and Templates</h2>
<p>The default generated template files exist in the <span class="file">fuel/modules/fuel/views/_generated/{type}</span> folder where <dfn>{type}</dfn>
is either "advanced" or "simple". You can overwrite these defaults by creating a <span class="file">fuel/application/views/_generated/{type}</span> 
folder with files that correspond to the files specified in the <a href="<?=user_guide_url('installation/configuration')?>">FUEL configuration file</a> under the "generated" parameter.
Additionally, you can set additional module folders to look in by adding to the "search" parameter array shown in the configuration array below:
</p>
<pre class="brush:php">
$config['generate'] = array(
							'search'   => array('app', 'fuel'),
							'advanced' => array(
										'assets/css/{module}.css',
										'assets/images/ico_cog.png',
										'assets/js/{ModuleName}Controller.js',
										'assets/cache/',
										'config/{module}.php',
										'config/{module}_routes.php',
										'controllers/{module}.php',
										'helpers/{module}_helper.php',
										'libraries/Fuel_{module}.php',
										'models/',
										'tests/sql/',
										'views/_admin/',
										'views/_blocks/',
										'views/_docs/',
										'views/_layouts/',
							),
							'simple' => 'MY_fuel_modules.php',
							'model'  => array(
											'{model}_model.php',
											'sql/{table}.sql',
											),
										);

</pre>

<h2>Models</h2>
<p>The following will create a model named "examples_model.php", generate a placeholder table (you'll need to modify):</p>
<pre class="brush:php">
php index.php fuel/generate/model/ examples

// generates multiple models at once
php index.php fuel/generate/model/ examples:examples2
</pre>

<p class="important">Separating module names with a colon will generate multiple models.</p>

<h2>Simple Modules</h2>
<p>The following will create a model named "examples_model.php", generate a placeholder table (you'll need to modify), add the permisions to manage it in the CMS,  and will add it to the <span class="file">fuel/application/config/MY_fuel_modules.php</span>:</p>
<pre class="brush:php">
php index.php fuel/generate/simple/ examples
</pre>

<h2>Advanced Modules</h2>
<p>The following will create a directory named "test" in the <span class="file">fuel/modules/</span> folder, as well as create a permission and add it to the "modules_allowed" FUEL configuration.
It will generate by default the files specified in the
<a href="<?=user_guide_url('installation/configuration')?>">FUEL configuration file</a> under the "generated" parameter:</p>
<pre class="brush:php">
php index.php fuel/generate/advanced/ examples
</pre>

<h2>Placeholder Variables</h2>
<p>The following variables are available to be used in your generation templates:</p>
<ul>
	<li><strong>{module}</strong>: the module name (lowercased)</li>
	<li><strong>{model}</strong>: the model name without the "_model" suffix (lowercased)</li>
	<li><strong>{table}</strong>: the table name</li>
	<li><strong>{module_name}</strong>:</li>
	<li><strong>{model_name}</strong>: the model name with the first letter upper cased and without the suffix (e.g. News)</li>
	<li><strong>{model_record}</strong>: The model records name which will remove any pluralization</li>
	<li><strong>{ModuleName}</strong>: A camel-cased version of the module name</li>
</ul>
