/**
 *  BLOCK: News Toplist
 */
//  Import CSS.
import './editor.css'
        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components
const { TextareaControl,SelectControl } = wp.components
const url = ctlAdmin.home_url+'/wp-json/wp/v2/categories' ;
registerBlockType('casinotoplist/news-toplist', {
    title: __('News Toplist'),
    icon: 'shield',
    category: 'casinotoplist',
    keywords: [
        __('News list'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        qty: {
            type: 'string',
        },
        categories:{
        type:'object'
        },
         category: {
            type: 'string',
        },
         button_text: {
            type: 'string',
        },
        
        
    },

    edit(props) {

        var qty = props.attributes.qty;
        var category = props.attributes.category;
        var button_text = props.attributes.button_text;
        var categories = props.attributes.categories;
        
        function onChangeQty(content) {
            props.setAttributes({qty: content});
        }
        var onChangeCategory = function (content) {
            props.setAttributes({category: content});
        };
        var onChangeButtonText = function (content) {
            props.setAttributes({button_text: content});
        };
         if(typeof props.attributes.categories == "undefined"){
            wp.apiFetch({
                url: url
            }).then( categories => {
                props.setAttributes({
                    categories: categories
                })
            } );
        }
        if(!props.attributes.categories){
            return 'Loading......';
        }
        if(props.attributes.categories && props.attributes.categories.length === 0){
            return 'No Categories found....please add some!';
        }
        var data_arr = [];
        {
            props.attributes.categories.map(category => {
              var data =  {label:category.name, value:category.id}
              data_arr.push(data);
            });
        }
        function Category(props){
        return <SelectControl
                label="Select Categories"
                value={ category }
                options={ data_arr}
                onChange={onChangeCategory} 
                />;
        }
        
        
        return (
                <div id="block-article-top" >
                    <TextControl
                        label={__('Quantity')}
                        onChange={onChangeQty} 
                        value={qty}
                        placeholder={__('Quantity')}
                        />
                        <TextControl
                        label={__('Button Text')}
                        onChange={onChangeButtonText} 
                        value={button_text}
                        placeholder={__('Button Text')}
                        />
                        <Category categories={categories} />
                       
        
                </div>
                )
    },
    save(props) {
        return null
    },
})