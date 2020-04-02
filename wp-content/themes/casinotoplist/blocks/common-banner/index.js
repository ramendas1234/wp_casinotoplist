/**
 *  BLOCK: Common Banner
 */
//  Import CSS.
import './editor.css'
        const {__} = wp.i18n
const {registerBlockType} = wp.blocks
const {RichText} = wp.blockEditor
const { TextControl } = wp.components
const { TextareaControl } = wp.components
registerBlockType('casinotoplist/common-banner', {
    title: __('Common Banner'),
    icon: 'nametag',
    category: 'casinotoplist',
    keywords: [
        __('common banner'),
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
         description: {
            type: 'string',
        },
        
        
    },

    edit(props) {

        var title = props.attributes.title;
        var description = props.attributes.description;
        
        function onChangeTitle(content) {
            props.setAttributes({title: content});
        }
        var onChangeDescription = function (content) {
            props.setAttributes({description: content});
        };
        
        
        return (
                <div id="block-common-banner" >
                    <TextControl
                        label={__('Title')}
                        onChange={onChangeTitle} 
                        value={title}
                        placeholder={__('Title')}
                        />
                    <TextareaControl
                        label={__('Description')}
                        onChange={onChangeDescription} 
                        value={description}
                        placeholder={__('Description')}
                        />    
        
                </div>
                )
    },
    save(props) {
        return null
    },
})