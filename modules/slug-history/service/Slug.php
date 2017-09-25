<?php
/**
 * slug service
 * @package slug-history
 * @version 0.0.1
 * @upgrade true
 */

namespace SlugHistory\Service;
use SlugHistory\Model\SlugHistory as SHistory;

class Slug {
    
    /**
     * Create new history
     * @param string $group History group
     * @param integer $id Object id
     * @param string $old Old object slug
     * @param string $new New object slug
     * @return integer slug history row id
     */
    public function create($group, $id, $old, $new){
        $object = [
            'group'  => $group,
            'object' => $id,
            'old'    => $old,
            'new'    => $new
        ];
        
        return SHistory::create($object);
    }
    
    /**
     * Get slug history based on group and slug
     * @param string $group History group
     * @param string $slug Old object slug
     * @return object The slug history
     */
    public function get($group, $slug){
        return SHistory::get(['group'=>$group, 'old'=>$slug], false, false, 'created DESC');
    }
    
    /**
     * Redirect user to the very new slug
     * @param string $group History group
     * @param string $slug Old object slug
     * @param string $router Router name to redirect to
     * @param string $router_param The slug paramter to send to router
     * @param array $router_params Additional parameters to send to url generator.
     * @return boolean false on no data found
     */
    public function goto($group, $slug, $router, $router_param='slug', $router_params=[]){
        $hist = SHistory::get(['group'=>$group, 'old'=>$slug], false, false, 'created DESC');
        if(!$hist)
            return false;
        
        $hist = SHistory::get(['group'=>$group, 'object'=>$hist->object], false, false, 'created DESC');
        
        $router_params[$router_param] = $hist->{'new'};
        $next = \Phun::$dispatcher->router->to($router, $router_params);
        
        \Phun::$dispatcher->res->redirect($next, 301);
    }
    
    /**
     * Get slug history based on group and slug
     * @param string $group History group
     * @param string $id Object id
     * @return array list of slug histories
     */
    public function index($group, $id){
        return SHistory::get(['group'=>$group, 'object'=>$id], true, false, 'created DESC');
    }
    
    /**
     * Get slug history based on group and slug
     * @param string $group History group
     * @param string $id Object id
     * @return boolean true on success false otherwise
     */
    public function remove($group, $id){
        return SHistory::remove(['group'=>$group, 'object'=>$id]);
    }
}