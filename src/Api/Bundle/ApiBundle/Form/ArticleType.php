<?php

namespace Api\Bundle\ApiBundle\Form;


class ArticleType extends AbstractType
{

    /**
     * Build a new Form
     *
     * @param FormBuilderInterface $builder Form builder
     * @param array                $options List of options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', ['label' => 'Title', 'required' => true])
            ->add('leading', 'text', ['label' => 'Leading'])
            ->add('body', 'text', ['label' => 'Content'])
            ->add('author', 'text', ['label' => 'Author']);
    }

    /**
     * Define defaults options
     *
     * @param OptionsResolverInterface $resolver Options resolver
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Api\Bundle\ApiBundle\Document\Article',
                'cascade_validation' => true
            )
        );
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'api_apidbundle_article';
    }


    public function process()
    {

    }
}
