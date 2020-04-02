/**
 *  BLOCK: Casino List
 */

        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components
const { TextareaControl,FormToggle } = wp.components

registerBlockType('casinotoplist/game-guide', {
    title: __('Game Guide'),
    icon: 'visibility',
    category: 'casinotoplist',
    keywords: [
        __('game guide'),
    ],
    supports: {
        html: false,
        reusable: false,
        align: false
    },

    // Set up data model for custom block
    attributes: {
        title: {
            type: 'string',
        },
        sub_title: {
            type: 'string',

        },
        qty: {
            type: 'string',

        },
        check_all_guides:{
        type:'boolean',
        default:false
    },
    all_guides_url:{
        type:'string',
    }
    },

    edit(props) {

        var title = props.attributes.title;
        var sub_title = props.attributes.sub_title;
        var qty = props.attributes.qty;
        var check_all_guides = props.attributes.check_all_guides;
        var all_guides_url = props.attributes.all_guides_url;
        function onChangeTitle(content) {
            props.setAttributes({title: content})
        }
        function onQtyTitle(content) {
            props.setAttributes({sub_title: content})
        }
        function onChangeQty(content) {
            props.setAttributes({qty: content})
        }
        var onChangeChekAll = function (state) {
            props.setAttributes({check_all_guides: (!check_all_guides)?true:false});
            
        }
        var onChangeGuidesUrl = function (content) {
            props.setAttributes({all_guides_url: content});
        };
        var GuideslistUrl = function(props){
            return (props.value)?<TextControl
                     label={__('Check All Game Guides Url')}
                     onChange={onChangeGuidesUrl} 
                     value={all_guides_url}
                     placeholder={__('Please enter game guides listing url')}
                     /> : '' ;
        }
        return (
                <div id="block-game-guide" >
                    <TextControl
                        label={__('Game Guide Title')}
                        onChange={onChangeTitle} 
                        value={title}
                        placeholder={__('Title')}
                        />
                    <TextareaControl
                        label={__('Sub Heading')}
                        onChange={onQtyTitle} 
                        value={sub_title}
                        placeholder={__('sub heading')}
                        />
                    <TextControl
                        label={__('Quantity')}
                        onChange={onChangeQty} 
                        value={qty}
                        placeholder={__('Enter quantity')}
                        />
                    <div class="components-base-control">
                                        <label class="components-base-control__label">Check All Game Guides?</label>    
                                    <FormToggle 
                                        checked={check_all_guides}
                                        onChange={onChangeChekAll}        
                                    />
                                        </div>
                    <GuideslistUrl value={ check_all_guides } />                    
                </div>
                )
    },
    save(props) {
        return null
    },
})